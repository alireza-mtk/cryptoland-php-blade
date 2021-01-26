<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobGroup;
use App\Models\Post;
use App\Models\RatingQuestion;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use NascentAfrica\Jetstrap\JetstrapFacade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // custom public_html bind 
        $this->app->bind('path.public', function () {
            return realpath(base_path() . '/../public_html');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JetstrapFacade::bootstrap4();
        JetstrapFacade::useAdminLte3();

        Schema::defaultStringLength(191);

        //carbon localization
        Carbon::setLocale(env('APP_LOCAL', 'fa'));


        if (!$this->app->runningInConsole()) {


            //prefooter variable
            view()->composer('partials.prefooter', function ($view) {

                $topratedjobs = Job::latest()->with('job_category')->take(3)->get();
                $mostviewedjobs  = Job::latest()->with('job_category')->take(3)->get();

                $view->with(compact('topratedjobs', 'mostviewedjobs'));
            });




            //footer variable
            view()->composer('partials.footer', function ($view) {
                $footersettings = Setting::first();

                $popularjobs = Job::withCount(['ratings as average_rating' => function ($query) {
                    $query->select(DB::raw('coalesce(avg(rating),0)'));
                }])->orderByDesc('average_rating')->take(3)->get();

                $latestjobs = Job::latest()->with('job_category')->withCount(['ratings as average_rating' => function ($query) {
                    $query->select(DB::raw('coalesce(avg(rating),0)'));
                }])->take(3)->get();

                $featuredJobs = Job::latest()->select('jobs.*')
                    ->join('users', 'jobs.user_id', '=', 'users.id')
                    ->join('featureds', 'featureds.user_id', '=', 'users.id')
                    ->join('plans', function ($j) {
                        $j->on('plans.id', '=', 'featureds.plan_id')
                            ->whereDate('featureds.created_at', '<', now()->addDays('plans.duration')->toDateString());
                    })
                    ->take(3)->get();

                $popularCategoryJobs = JobCategory::withCount('jobs')->orderByDesc('jobs_count')->take(8)->get();
                $faqQuestions = JobCategory::withCount('jobs')->orderByDesc('jobs_count')->take(8)->get();


                $view->with(compact('footersettings', 'popularjobs', 'featuredJobs', 'latestjobs', 'popularCategoryJobs'));
            });

            //Sidebar variables
            view()->composer('partials.sidebar', function ($view) {
                $jobgroups = JobGroup::latest()->with('job_category')->withCount('job_category')->get();
                $featuredjobs = Job::latest()->with('job_category')->withCount(['ratings as average_rating' => function ($query) {
                    $query->select(DB::raw('coalesce(avg(rating),0)'));
                }])->get();

                $view->with(compact('jobgroups', 'featuredjobs'));
            });

            //Navbar variables
            view()->composer('partials.navbar', function ($view) {
                $jobgroups = JobGroup::latest()->with('job_category')->get();
                $cities = City::pluck('name', 'id');
                $view->with(compact('jobgroups', 'cities'));
            });


            //Search variables
            view()->composer('pages.search', function ($view) {
                $jobgroups = JobGroup::latest()->with('job_category')->get();
                $cities = City::pluck('name', 'id');
                $view->with(compact('jobgroups', 'cities'));
            });


            // SHARE TO ALL ROUTES
            view()->share('jobgroups', JobGroup::pluck('name', 'id'));
            // view()->share('jobcategories', JobGroup::pluck('name', 'id'));


            // posts sidebar
            view()->composer('pages.posts.sidebar', function ($view) {

                $archives     = Post::archives();
                $categories   = Category::has('posts')->withCount('posts')->get();
                $tags         = Tag::has('posts')->get();
                $latestposts = Post::latest()->take(5)->get();
                $latestjobs = Job::latest()->take(3)->get();

                $view->with(compact('archives', 'categories', 'tags', 'latestposts', "latestjobs"));
            });

            // single job
            view()->composer('pages.jobs.*', function ($view) {
                $ratingQuestions = RatingQuestion::all();
                $view->with(compact("ratingQuestions"));
            });





            // $bedroomdistinct  = Property::select('bedroom')->distinct()->get();
            // view()->share('bedroomdistinct', $bedroomdistinct);

            // view()->share('neighborhoods', Neighborhood::pluck('name', 'id'));
            // view()->share('featureslist', Feature::pluck('name', 'id'));

            // view()->share('team', User::latest()->where(["role_id" => 2])->take(3)->get());



            // SHARE WITH SPECIFIC VIEW
            // view()->composer('pages.search', function ($view) {
            //     $view->with('bathroomdistinct', Property::select('bathroom')->distinct()->get());
            // });

            //navbar variable
            // view()->composer('partials.navbar', function ($view) {
            //     $navbarsettings = Setting::first(); 
            //     $view->with(compact("navbarsettings"));
            // });


            //latest neighborhoods variable
            // view()->composer('partials.latestNeighborhoods', function ($view) {
            //     $latestNeighborhoods = Neighborhood::latest()->limit(6)->get();

            //     $view->with(compact("latestNeighborhoods"));
            // });


            //footer variable
            // view()->composer('partials.footer', function ($view) {

            //     $latestproperties = Property::latest()->take(3)->get();
            //     $footersettings = Setting::first();

            //     $view->with(compact('footersettings', "latestproperties"));
            // });


            // view()->composer('partials.testimonial', function ($view) {
            //     $view->with('testimonials', Testimonial::latest()->limit(4)->get());
            // });


            // view()->composer('backend.partials.navbar', function ($view) {
            //     $view->with('countmessages', Message::latest()->where('agent_id', Auth::id())->count());
            //     $view->with('navbarmessages', Message::latest()->where('agent_id', Auth::id())->take(5)->get());
            // });

            // view()->composer('pages.contact', function ($view) {
            //     $view->with('contactsettings', Setting::select('phone', 'email', 'address')->get());
            // });




            // view()->composer('pages.properties.sidebar', function ($view) {

            //     $latestproperties = Property::latest()->take(3)->get();

            //     $neighborhoodsForSidebar = DB::table('properties')
            //      ->select('neighborhood_id', DB::raw('count(*) as total'))
            //      ->groupBy('neighborhood_id')
            //      ->get();

            //     $view->with(compact('neighborhoodsForSidebar', "latestproperties"));
            // });
        }
    }
}
