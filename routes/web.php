<?php

use App\Http\Controllers\templateController;
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
    Route::resource('media-gallery', 'users\usersMedia');
    Route::post('useruploadmedia','users\usersMedia@store')->name('useruploadmedia') ;
    Route::get('photo-gallery', 'users\usersMedia@photoGallery')->name('photoGallery');
    Route::get('audio-gallery', 'users\usersMedia@audioGallery')->name('audioGallery');
    Route::get('video-gallery', 'users\usersMedia@videoGallery')->name('videoGallery');
    Route::get('/download/{image}', 'users\usersMedia@downloadSingle')->name('downloadSingleMedial');

    Route::get('download/images', 'usersMedia@downloadImage')->name('downloadImage');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'admin\AdminController@index')->name('admindashboard');
      Route::resource('admin-media-gallery', 'admin\adminMedia');
    Route::post('useruploadmedia','admin\adminMedia@store')->name('adminUploadMedia') ;
    Route::get('admin-photo-gallery', 'admin\adminMedia@photoGallery')->name('adminPhotoGallery');
    Route::get('admin-audio-gallery', 'admin\adminMedia@audioGallery')->name('adminAudioGallery');
    Route::get('admin-video-gallery', 'admin\adminMedia@videoGallery')->name('adminVideoGallery');
    Route::resource('category', 'admin\categoryController');
    Route::resource('theme', 'admin\themeController');
    Route::resource('functionality', 'admin\FunctionalityController');
    Route::get('/add-functionality/{functionid}/{themename}/{themeid}/{functionname}', 'admin\themeController@addFunction')->name('addFunctionalityToThemeSetup');
    Route::post('carouselSetupt', 'admin\themeController@addCarousel')->name('addCarouselSetup');
    Route::post('activateTheme', 'admin\themeController@activateTheme')->name('activateTheme');
    Route::get('/deactivate-theme/{id}', 'admin\themeController@themeDisable')->name("themeDisable");
    Route::get("/setup/{id}/{themename}", 'admin\themeController@presetup')->name('themePreset');
    Route::resource('template', 'admin\templateController');
    Route::get('theme-view', 'admin\themeController@themePreview')->name('themePreview');

});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');