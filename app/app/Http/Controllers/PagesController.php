<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

use App\Models\Advertisement;
use App\Models\Message;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Job;
use App\Models\JobGroup;
use App\Models\Property;
use App\Models\Rating;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;

use Carbon\Carbon;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function index()
    {
        $jobgroups = JobGroup::latest()->with('job_category')->get();
        $jobs = Job::latest()->with('job_category')->get();

        return view('pages.index', compact('jobgroups', 'jobs'));
    }

    public function indexPrev()
    {
        $properties     = Property::latest()->where('featured', 1)->with('rating')->withCount('comments')->take(6)->get();
        $services       = Service::orderBy('service_order')->get();
        $testimonials   = Testimonial::take(10)->get();
        $posts          = Post::latest()->where('status', 1)->take(6)->get();
        return view('frontend.index', compact('properties', 'services', 'testimonials', 'posts'));
    }

    public function search(Request $request)
    {


        $searchedDescription = explode(' ', $request->description);
        $query = Job::query();

        $searchedCity = $request->city ? $request->city : null;
        $searchedGroup = $request->group ? $request->group : null;

        // just to send for the view
        $searchedDescriptionView = $request->description;


        foreach ($searchedDescription as $searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('description', 'like', '%' . $searchTerm . '%')->orWhere('address', 'like', '%' . $searchTerm . '%')->orWhere('title', 'like', '%' . $searchTerm . '%');
            });
        }

        if ($searchedCity) {
            $query->WhereHas('city', function ($query) use ($searchedCity) {
                $query->where('id', $searchedCity);
            });
        }

        if ($searchedGroup) {
            $query->WhereHas('job_category', function ($query) use ($searchedGroup) {
                $query->where('job_group_id', $searchedGroup);
            });
        }



        // get by highest rating
        $jobs = $query->withCount(['ratings as average_rating' => function ($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->get();



        return view('pages.search', [
            'jobs' => $jobs,
            'searchedDescription' => $searchedDescriptionView,
            'searchedCity' => $searchedCity,
            'searchedGroup' => $searchedGroup
        ]);
    }
    public function jobs()
    {

        // Get jobs by highest rating
        $jobs = Job::withCount(['ratings as average_rating' => function ($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->orderByDesc('average_rating')->get();

        return view('pages.jobs.index', compact('jobs'));
    }

    public function jobsShow($id)
    {
        $job = Job::where('id', $id)->with('gallery', 'user', 'job_category', 'city')->withCount('comments', 'view_counts')->withCount(['ratings as average_rating' => function ($query) {
            $query->select(DB::raw('coalesce(avg(rating),0)'));
        }])->first();



        $rating = $job->ratings;
        $averageRating = 0;
        foreach ($rating as $item) {
            $averageRating += $item->rating;
        }
        count($rating) ? $averageRating /= count($rating) : null;
        // get the featured status
        $averageRating = round($averageRating * 2) / 2 + .5;


        // make a view record if requried
        $job->view_counts()->firstOrCreate([
            'ip' => \Request::ip()
        ]);

        return view('pages.jobs.single', compact('job', 'averageRating'));
    }

    public function faq()
    {
        return view('pages.faq');
    }


    // BLOG PAGE
    public function posts()
    {
        $month = request('month');
        $year  = request('year');

        $posts = Post::latest()->withCount('comments')
            ->when($month, function ($query, $month) {
                return $query->whereMonth('created_at', Carbon::parse($month)->month);
            })
            ->when($year, function ($query, $year) {
                return $query->whereYear('created_at', $year);
            })
            ->paginate(env("PAGINATION_COUNT", 10));

        return view('pages.posts.index', compact('posts'));
    }

    public function postSingle($id)
    {
        $post = Post::with('comments', 'gallery')->withCount('comments')->where('id', $id)->first();

        return view('pages.posts.single', compact('post'));
    }


    // BLOG COMMENT
    public function postComments(Request $request, $id)
    {
        $request->validate([
            'body'  => 'required'
        ]);

        $post = Post::find($id);

        $post->comments()->create(
            [
                'user_id'   => Auth::id(),
                'body'      => $request->body,
                'parent'    => $request->parent,
                'parent_id' => $request->parent_id,
                'approved' => false
            ]
        );

        return back();
    }


    // BLOG CATEGORIES
    public function postCategories()
    {
        $posts = Post::latest()->withCount(['comments', 'categories'])
            ->whereHas('categories', function ($query) {
                $query->where('categories.slug', '=', request('slug'));
            })
            ->where('status', 1)
            ->paginate(env("PAGINATION_COUNT", 10));

        return view('pages.blog.index', compact('posts'));
    }

    // BLOG TAGS
    public function postTags()
    {
        $posts = Post::latest()->withCount('comments')
            ->whereHas('tags', function ($query) {
                $query->where('tags.slug', '=', request('slug'));
            })
            ->paginate(env("PAGINATION_COUNT", 10));


        return view('pages.blog.index', compact('posts'));
    }

    // BLOG AUTHOR
    public function postAuthor()
    {
        $posts = Post::latest()->withCount('comments')
            ->whereHas('user', function ($query) {
                $query->where('username', '=', request('username'));
            })
            ->where('status', 1)
            ->paginate(env("PAGINATION_COUNT", 10));

        return view('pages.blog.index', compact('posts'));
    }

    // CONATCT PAGE
    public function contact()
    {

        $settings = Setting::first();
        return view('pages.contact', compact('settings'));
    }

    public function messageContact(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'phone_number'     => 'required',
            'message'   => 'required'
        ]);

        $admins  = explode(',', env('MAIL_ADMIN_EMAIL'), 0);

        foreach ($admins as $email) {
            Mail::to($email)->send(new Contact($request->name, $request->message, $request->email, $request->phone_number));
        }

        Toastr::success('message', 'پیام شما با موفقیت ارسال شد');
        return back();
    }

    public function contactMail(Request $request)
    {
        return $request->all();
    }

    // ABOUT PAGE
    public function about()
    {
        $settings = Setting::first();
        return view('pages.about', compact('settings'));
    }
}
