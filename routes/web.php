<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/dashboard', function () {
    return view('users.customers.dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
