<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/', 'PagesController@index')->name('index');
Route::get('/about-us', 'PagesController@about')->name('about');
Route::get('/news', 'PagesController@news')->name('news');
Route::get('/projects', 'PagesController@projects')->name('projects');
Route::get('/faq', 'PagesController@faq')->name('faq');
Route::get('/contact-us', 'PagesController@contact')->name('contact');
Route::get('/project-details', 'PagesController@project_details')->name('project_details');
Route::get('/shop', 'PagesController@shop')->name('shop');
Route::get('/team', 'PagesController@team')->name('team');
Route::get('/testimony', 'PagesController@testimony')->name('testimony');
Route::get('/news-details', 'PagesController@news_details')->name('news_details');
Route::get('/our-service', 'PagesController@service')->name('service');


// users routes
Auth::routes();
Route::prefix('users')->middleware(['auth', 'users'])->group(function () {
    Route::get('/dashboard', 'users\UsersController@index')->name('usersdashboard');
    Route::resource('media-gallery', 'Media');
    Route::post('useruploadmedia','Media@store')->name('useruploadmedia') ;
    Route::get('photo-gallery', 'Media@photoGallery')->name('photoGallery');
    Route::get('audio-gallery', 'Media@audioGallery')->name('audioGallery');
    Route::get('video-gallery', 'Media@videoGallery')->name('videoGallery');
    Route::get('/download/{image}', 'Media@downloadSingle')->name('downloadSingleMedial');

    Route::get('download/images', 'Media@downloadImage')->name('downloadImage');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'admin\AdminController@index')->name('admindashboard');


});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
