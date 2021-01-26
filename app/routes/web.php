<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/link', function () {

    // \File::link(storage_path('/storage/app/public'), public_path('../public_html/storage'));
});

Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
});

Route::get('/info', function () {
    phpinfo();
});


// Auth Routes
// Auth::routes();
Route::post('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/requestCode', [LoginController::class, 'requestCode'])->name('requestCode');
Route::get('/verify', [LoginController::class, 'showVerifyForm'])->name('verify');
Route::post('/verify', [LoginController::class, 'checkAndAuthenticate'])->name('verify');

// FRONT-END ROUTES
Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'messageContact'])->name('messageContact');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('posts', [PagesController::class, 'posts'])->name('posts');
Route::get('posts/{id}', [PagesController::class, 'postSingle'])->name('posts.single');
Route::post('/posts/comment/{id}', [PagesController::class, 'postComments'])->name('posts.comment');
Route::get('/posts/categories/{slug}', [PagesController::class, 'postCategories'])->name('posts.categories');
Route::get('/posts/tags/{slug}', [PagesController::class, 'postTags'])->name('posts.tags');
Route::get('/posts/author/{username}', [PagesController::class, 'postAuthor'])->name('posts.author');



Route::get('/our-term', function () {
    return view('pages.our-terms');
})->name('our-terms');


Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');


Route::get('/blog-single', function () {
    return view('pages.blog-single');
})->name('blog-single');




Route::get('/service', function () {
    return view('pages.service');
})->name('service');


Route::get('/token', function () {
    return view('pages.token');
})->name('token');


Route::get('/team', function () {
    return view('pages.team');
})->name('team');


// Temp routes
Route::get('/admin/advertisements', function () {
    return view('admin.advertisements.index');
})->name('admin.advertisements.index');

// user routes
Route::get('/user/settings', function () {
    return view('user.settings');
})->name('user.settings');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name("dashboard");

    // Manage Users
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);

    // Manage Jobs
    Route::resource('/jobs', App\Http\Controllers\Admin\JobController::class);


    // settings route
    Route::get('settings', [App\Http\Controllers\Admin\DashboardController::class, 'settings'])->name('settings');
    Route::post('settings', [App\Http\Controllers\Admin\DashboardController::class, 'settingStore'])->name('settings.store');

    // settings route
    Route::get('changepassword', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword'])->name('changepassword');
    Route::post('changepassword', [App\Http\Controllers\Admin\DashboardController::class, 'changePasswordUpdate'])->name('changepassword.update');

    // profile route
    // Route::get('profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');
    // Route::post('profile', [App\Http\Controllers\Admin\DashboardController::class, 'profileUpdate'])->name('profile.update');

    // plans
    Route::resource('plans', App\Http\Controllers\Admin\PlanController::class);

    Route::get('comments', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
    Route::post('comments/{id}', [App\Http\Controllers\Admin\CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');

    // posts
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);

    // Manage Questions
    Route::resource('ratingquestions', App\Http\Controllers\Admin\RatingQuestionController::class);

    // Job Groups
    Route::resource('jobgroups', App\Http\Controllers\Admin\JobGroupController::class);

    // Job Category
    Route::resource('jobcategories', App\Http\Controllers\Admin\JobCategoryController::class);

    // Peymetns
    Route::get('peyments', [App\Http\Controllers\Admin\ZarinpalPeymentController::class, 'index'])->name('peyments.index');


    // reports
    Route::get('reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');


    // message route
    Route::get('message', [App\Http\Controllers\Admin\DashboardController::class, 'message'])->name('message');
    Route::get('message/read/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'messageRead'])->name('message.read');
    Route::get('message/replay/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'messageReplay'])->name('message.replay');
    Route::post('message/replay', [App\Http\Controllers\Admin\DashboardController::class, 'messageSend'])->name('message.send');
    Route::post('message/readunread', [App\Http\Controllers\Admin\DashboardController::class, 'messageReadUnread'])->name('message.readunread');
    Route::delete('message/delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'messageDelete'])->name('messages.destroy');
    Route::post('message/mail', [App\Http\Controllers\Admin\DashboardController::class, 'contactMail'])->name('message.mail');
});


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user'], 'as' => 'user.'], function () {

    // User Dashboard
    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name("dashboard");

    // Manage profile
    Route::get('profile', [App\Http\Controllers\User\DashboardController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\User\DashboardController::class, 'profileUpdate'])->name('profile.update');

    // Manage passwords
    Route::get('changepassword', [App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('changepassword');
    Route::post('changepassword', [App\Http\Controllers\User\DashboardController::class, 'changePasswordUpdate'])->name('changepassword.update');

    // User Dashboard
    Route::get('job', [App\Http\Controllers\User\DashboardController::class, 'job'])->name('job.index');
    Route::post('job/update', [App\Http\Controllers\User\DashboardController::class, 'jobUpdate'])->name('job.update');
    Route::post('job/comment', [App\Http\Controllers\User\DashboardController::class, 'commentSubmit'])->name('job.comment');
    // Submit a report for a job
    Route::post('job/report', [App\Http\Controllers\User\DashboardController::class, 'submitReport'])->name('job.report');

    Route::get('plans', [App\Http\Controllers\User\DashboardController::class, 'plans'])->name('plans.index');
    Route::post('plans/checkout/', [App\Http\Controllers\User\DashboardController::class, 'plansCheckout'])->name('plans.checkout');

    // Submit comments for posts
    Route::post('posts/comment/', [App\Http\Controllers\User\DashboardController::class, 'submitPostComment'])->name('posts.comment');

    // manage peyments
    Route::get('/peyments', [App\Http\Controllers\User\DashboardController::class, 'peyments'])->name('peyments.index');
    Route::get('/verify-zarinpal', [App\Http\Controllers\User\DashboardController::class, 'zarinpalVerify'])->name('user.zarinpalVerify');

    // submit job rating
    Route::post('job/rating/{id}', [App\Http\Controllers\User\DashboardController::class, 'submitRating'])->name('job.rating');
});
