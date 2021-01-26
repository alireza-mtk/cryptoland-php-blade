<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Featured;
use App\Models\ImageGallery;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Rating;
use App\Models\User;
use App\Models\ZarinpalPeyment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Auth;
use Hash;
use Illuminate\Support\Facades\Session;
use Toastr;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // get rating 
        $rating = $user->job ? $user->job->ratings : [];
        $averageRating = 0;
        foreach ($rating as $item) {
            $averageRating += $item->rating;
        }
        count($rating) ? $averageRating /= count($rating) : null;
        // get the featured status
        $averageRating = round($averageRating * 2) / 2 + .5;



        // calculate rating statistics
        $ratingStatistics = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
        ];

        foreach ($rating as $item) {
            if ($item->rating <= 1)
                $ratingStatistics[1]++;
            else if ($item->rating <= 2)
                $ratingStatistics[2]++;
            else if ($item->rating <= 3)
                $ratingStatistics[3]++;
            else if ($item->rating <= 4)
                $ratingStatistics[4]++;
            else if ($item->rating <= 5)
                $ratingStatistics[5]++;
            else if ($item->rating <= 6)
                $ratingStatistics[6]++;
            else if ($item->rating <= 7)
                $ratingStatistics[7]++;
        }

        $featureRecord = $user->features()->latest()->first();
        if ($featureRecord) {
            $recordDate = Carbon::parse($featureRecord->created_at);
            $now = Carbon::now();
            $diff = $recordDate->diffInDays($now);
            if (
                $featureRecord->plan->duration >= $diff
            ) {
                $featuredStatus = 1;
                $remainingDays = $featureRecord->plan->duration - $diff;
                return view('user.dashboard', compact('featuredStatus', 'featureRecord', 'remainingDays', 'averageRating', 'rating', 'user', 'ratingStatistics'));
            }
        }
        $featuredStatus = 0;
        $remainingDays = null;


        return view('user.dashboard', compact('featuredStatus', 'featureRecord', 'remainingDays', 'averageRating', 'rating', 'ratingStatistics'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {

        $request->validate([
            'name'   =>  'required|string',
            'image'     => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $image = $request->file('image');

        if ($image) {
            $currentDate = Carbon::now()->getTimestamp();
            $imagename = $currentDate . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('users')) {
                Storage::disk('public')->makeDirectory('users');
            }

            if ($user->image != 'default.png' && Storage::disk('public')->exists('users/' . $user->image)) {
                Storage::disk('public')->delete('users/' . $user->image);
            }
            $propertyimage = Image::make($image)->stream();
            Storage::disk('public')->put('users/' . $imagename, $propertyimage);
            $user->image = $imagename;
        } else {
            $imagename = 'default.png';
        }

        $user->save();

        Toastr::success('message', 'Profile has just been updated');
        return back();
    }
    public function changePassword()
    {
        return view('user.changepassword');
    }

    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {

            Toastr::error('message', 'Your current password does not matches with the password you provided! Please try again.');
            return redirect()->back();
        }
        if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0) {

            Toastr::error('message', 'New Password cannot be same as your current password! Please choose a different password.');
            return redirect()->back();
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('newpassword'));
        $user->save();

        Toastr::success('message', 'Password changed successfully.');
        return redirect()->back();
    }

    public function job()
    {
        $job = Auth::user()->job;
        $jobcategories = JobCategory::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view('user.job.index', compact('job', 'jobcategories', 'cities'));
    }
    public function jobUpdate(Request $request)
    {


        $request->validate([
            'title'   =>  'required|string',
            'job_category'  => 'required|int',
            'city_id'     => 'required|int',
            'whatsapp'     => 'required|string',
            'instagram'     => 'required|string',
            'tweeter'     => 'required|string',
            'facebook'     => 'required|string',
            'website'     => 'required|string',
            'address'     => 'required|string',
            'description'     => 'required|string',
            'gallaryimage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        // check if the user name has been set
        if (!Auth::user()->name) {
            Toastr::error('message', 'لطفا ابتدا از پنل کاربری اطلاعات پروفایل خود را تکمیل کنید');
            return redirect()->back();
        }

        $job = Job::firstOrNew(['user_id' => Auth::id()]);

        $job->title = $request->title;
        $job->job_category_id = $request->job_category;
        $job->city_id = $request->city_id;
        $job->whatsapp = $request->whatsapp;
        $job->instagram = $request->instagram;
        $job->tweeter = $request->tweeter;
        $job->facebook = $request->facebook;
        $job->website = $request->website;
        $job->address = $request->address;
        $job->description = $request->description;
        $job->save();

        $gallary = $request->file('gallaryimage');


        // check if there is no previous record of rating
        // then submit a rating record for this job as default operation
        if (!$job->ratings->count())
            $job->ratings()->create([
                'user_id' => Auth::id(),
                'rating' => 3.5
            ]);

        if ($gallary) {
            // delete all the previous files
            { //getting the items
                $gallaryimg = ImageGallery::where(["imageable_type" => 'App\Models\Job', 'imageable_id' => $job->id])->get();

                //deleting the items
                foreach ($gallaryimg as $item) {
                    //deleting the files
                    if (Storage::disk('public')->exists('jobs/' . $item->name)) {
                        Storage::disk('public')->delete('jobs/' . $item->name);
                    }
                    //deletting the items
                    ImageGallery::destroy($item->id);
                }
            }

            foreach ($gallary as $image) {
                // Upload the new files
                $currentDate =  Carbon::now()->timestamp;
                $galimage['name'] = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $galimage['size'] = $image->getSize();
                if (!Storage::disk('public')->exists('jobs')) {
                    Storage::disk('public')->makeDirectory('jobs');
                }
                $theImage = Image::make($image)->stream();
                Storage::disk('public')->put('jobs/' . $galimage['name'], $theImage);

                $job->gallery()->create($galimage);
            }
        }


        Toastr::success('message', 'Profile has just been updated');
        return back();
    }
    public function submitReport(Request $request)
    {

        $request->validate([
            'purpose'   =>  'required|string',
            'job_id'  => 'required|int',
        ]);

        $job = Job::findOrFail($request->job_id);

        $job->reports()->create([
            'purpose'   =>  'required|string',
            'user_id' => Auth::id(),
        ]);

        Toastr::success('message', 'گزارش شما با موفقیت ثبت و در اولین فرصت به آن رسیدگی میشود. با تشکر از شما');
        return redirect()->back();
    }
    public function plans()
    {
        $plans = Plan::all();
        return view('user.plans.index', compact('plans'));
    }

    public function submitPostComment(Request $request)
    {
        $request->validate([
            'message'   =>  'required|string',
            'id'  => 'required|int',
        ]);

        $post = Post::findOrFail($request->id);

        // check if the user name has been set
        if (!Auth::user()->name) {
            Toastr::error('message', 'لطفا ابتدا از پنل کاربری اطلاعات پروفایل خود را تکمیل کنید');
            return redirect()->back();
        }
        $post->comments()->create([
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);

        Toastr::success('message', 'نظر شما با موفقیت ثبت و پس از تایید قابل نمایش می باشد');
        return redirect()->back();
    }
    public function commentSubmit(Request $request)
    {
        $request->validate([
            'message'   =>  'required|string',
            'id'  => 'required|int',
        ]);

        $job = Job::findOrFail($request->id);

        // check if the user name has been set
        if (!Auth::user()->name) {
            Toastr::error('message', 'لطفا ابتدا از پنل کاربری اطلاعات پروفایل خود را تکمیل کنید');
            return redirect()->back();
        }

        $job->comments()->create([
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);

        Toastr::success('message', 'نظر شما با موفقیت ثبت و پس از تایید قابل نمایش می باشد');
        return redirect()->back();
    }

    // request for peyment
    public function plansCheckout(Request $request)
    {

        $plan = Plan::findOrFail($request->id);
        $user = Auth::user();

        // check if the user name has been set
        if (!$user->name) {
            Toastr::error('message', 'لطفا ابتدا از پنل کاربری اطلاعات پروفایل خود را تکمیل کنید');
            return redirect()->back();
        }

        // check if the job record for this user has been set
        if (!$user->job) {
            Toastr::error('message', 'لطفا ابتدا از پنل کاربری اطلاعات شغل خود را تکمیل کنید');
            return redirect()->back();
        }


        $description = " پرداخت پلن " . $plan->name;

        $featuredRecord = Featured::latest()->where('user_id', Auth::id())->first();
        if ($featuredRecord) {

            $date = Carbon::parse($featuredRecord->created_at);
            $now = Carbon::now();
            $diff = $date->diffInMinutes($now);
            // check if the feature time has been expired or not
            if ($diff < $featuredRecord->plan->duration * 1440) {
                Toastr::error('message', 'شما در حال حاظر پلن فعال دارید. لطفا ابتدا پلن فعال خود را غیر فعال کنید');
                return redirect()->back();
            }
        }


        if (!$user->email || !$user->email || !$user->phone_number)
            Toastr::error('message', 'لطفا اطلاعات خود را تکمیل نمایید');



        $response = zarinpalRequest($plan->price, $user->email, $user->phone_number, $description);

        if ($response->Authority) {
            $pid = generateCode();

            $user->peyments()->create([
                'pid' => $pid,
                'authority' => $response->Authority,
                'description' => $description,
                'plan_id' => $plan->id,
                'user_id' => $user->id
            ]);

            // set session value
            Session::put('pid', $pid);
        }

        return zarinpalRedirect($response->Authority);
    }

    // verifyPeyment
    public function zarinpalVerify(Request $request)
    {
        $this->validate($request, [
            'Authority' => 'required', 'Status' => "required",
        ]);

        if ($request->Status !== "OK") {
            Toastr::error('message', 'عملیات پرداخت موفقیت آمیز نبود');
            // remove the session
            Session::forget('pid');
            return redirect()->back();
        }

        //get and remove the session
        $pid = Session::get('pid');
        // Session::forget('pid');

        $record = ZarinpalPeyment::where(['pid' => $pid, 'user_id' => Auth::id()])->first();
        if (!$record) {
            Toastr::error('message', 'اطلاعات شروع پرداخت شما پیدا نشد. لطفا با پشتیبانی تماس بگیرید');
            return redirect()->back();
        }

        // verfiy the peyment
        $response = zarinpalVerify($record->plan->price, $record->authority);

        if ($response->Status == 100) {
            $record->transactionId = $response->RefID;
            $record->save();

            // Make a featured record
            Featured::create([
                'user_id' => Auth::id(),
                'plan_id' => $record->plan->id,
                'peyment_id' => $record->id,
                'status' => 1,
            ]);

            Toastr::success('message', 'عملیات پرداخت با موفقیت انجام شد');
            return redirect()->route('user.dashboard');
        } else {
            Toastr::error('message', 'عملیات پرداخت موفقیت آمیز نبود');
            return redirect()->route('user.dashboard');
        }
    }

    // show peyments 
    public function peyments(Request $request)
    {

        $peyments = Featured::where('user_id', Auth::id())->get();

        $featureRecord = Auth::user()->features()->latest()->first();
        if ($featureRecord) {
            $recordDate = Carbon::parse($featureRecord->created_at);
            $now = Carbon::now();
            $diff = $recordDate->diffInDays($now);
            if (
                $featureRecord->plan->duration >= $diff
            ) {
                $featuredStatus = 1;
                return view('user.peyments.index', compact('peyments', 'featuredStatus', 'featureRecord'));
            }
        }
        $featuredStatus = 0;
        return view('user.peyments.index', compact('peyments', 'featuredStatus', 'featureRecord'));
    }


    public function submitRating(Request $request, $id)
    {

        $this->validate($request, [
            'question.*' => 'required|string'
        ]);


        // check if user has already rated this job
        // $previousRecord = Rating::where([
        //     'user_id' => Auth::id(),
        //     'job_id' => $id
        // ])->first();

        // if ($previousRecord) {
        //     Toastr::error('message', 'شما قبلا به این کاسب امتیاز داده اید');
        //     return back();
        // }


        $averageValue = 0;
        // summ all the input values
        foreach ($request->question as $key => $question) {

            switch ($question) {
                case 0:
                    $averageValue += 0;
                    break;
                case 1:
                    $averageValue += 1.5;
                    break;
                case 2:
                    $averageValue += 2;
                    break;
                case 3:
                    $averageValue += 2.5;
                    break;
                case 4:
                    $averageValue += 3;
                    break;
                case 5:
                    $averageValue += 3.5;
                    break;
                case 6:
                    $averageValue += 4;
                    break;
                case 7:
                    $averageValue += 4.5;
                    break;
                case 8:
                    $averageValue += 5;
                    break;
                case 9:
                    $averageValue += 5.5;
                    break;
                case 10:
                    $averageValue += 6;
                    break;
                case 11:
                    $averageValue += 6.5;
                    break;
                case 12:
                    $averageValue += 7;
                    break;
            }
        }


        $averageValue /= count($request->question);

        $averageValue = (int)($averageValue / .5);


        switch ($averageValue) {
            case 0:
                $averageValue = 0;
                break;
            case 1:
                $averageValue = .5;
                break;
            case 2:
                $averageValue = 1;
                break;
            case 3:
                $averageValue = 1.5;
                break;
            case 4:
                $averageValue = 2;
                break;
            case 5:
                $averageValue = 2.5;
                break;
            case 6:
                $averageValue = 3;
                break;
            case 7:
                $averageValue = 3.5;
                break;
            case 8:
                $averageValue = 4;
                break;
            case 9:
                $averageValue = 4.5;
                break;
            case 10:
                $averageValue = 5;
                break;
            case 11:
                $averageValue = 5.5;
                break;
            case 12:
                $averageValue = 6;
                break;
            case 13:
                $averageValue = 6.5;
                break;
            case 14:
                $averageValue = 7;
                break;
        };

        Rating::create([
            'user_id' => Auth::id(),
            'job_id' => $id,
            'rating' => $averageValue
        ]);

        Toastr::success('message', 'اطلاعات با موفقیت ثبت شد');
        return back();
    }
}
