<?php

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

// Route::get('/', function () {
//     return view('pages.index');
// });
Route::get('/', 'PagesController@index')->name('index');
Route::get('/about-us', 'PagesController@about')->name('about');
Route::get('/news', 'PagesController@news')->name('news');
Route::get('/projects', 'PagesController@projects')->name('projects');
Route::get('/', 'PagesController@index')->name('index');
Route::get('/', 'PagesController@index')->name('index');
Route::get('/', 'PagesController@index')->name('index');
Route::get('/', 'PagesController@index')->name('index');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
