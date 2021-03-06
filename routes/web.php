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
    // theme
    Route::resource('theme', 'users\UsersThemeConroller');
    Route::get('theme/{id}/{name}/preview', 'users\UsersThemeConroller@listThemesCategory')->name('themeCategory');
    Route::get('theme/{id}/{category}/{name}/preview', 'users\UsersThemeConroller@usersPreviewTheme')->name('usersPreviewTheme');
    Route::get('theme/{id}/{category}/{name}/{user}/setup', 'users\UsersThemeConroller@userThemeSetup')->name('userSetupTheme');
    Route::resource('userswish', 'users\UsersWishController');
    Route::get('choose-theme/{event}/{name}/{cat}/{catname}', 'users\UsersWishController@userChooseTheme')->name('userChooseTheme');
    Route::get("setup/{evenid}/{eventname}/{templateid}/{catname}", "users\UsersWishController@setupChooseTheme")->name('userPreseupTemplateChoosed');
    // theme setup 
    //    carousel
    Route::post('userCarouselSetupt', 'users\UsersThemeConroller@addCarousel')->name('usertemplateAddCarouselSetup');
    Route::patch('adminCarouselSetupUpdate', 'users\UsersThemeConroller@updateCarousel')->name("usertemplateUpdateCarouselSetup");
    Route::get('adminDeleteCarouseSetup/{theme}/{carouselid}', 'users\UsersThemeConroller@deleteCarousel')->name('useradmindeleteCarouselSetup');
    // template/theme
   
    // writer adminDateSetup
    Route::post('adminWriterSetup', 'users\UsersThemeConroller@writerSetup')->name('useradminWriterSetup');
    Route::patch('adminWriterSetupUpdate', 'users\UsersThemeConroller@writerSetupUpdate')->name('userwriterSetupUpdate');
    Route::get('adminDeleteWriterSetup/{theme}/{Writerid}', 'users\UsersThemeConroller@deleteWriter')->name('useradmindeleteWriterSetup');
    // date adminDateSetup
    Route::post('adminDateSetup', 'users\UsersThemeConroller@adminDateSetup')->name('useradminDateSetup');
    Route::patch('adminWriterSetupUpdate', 'users\UsersThemeConroller@writerSetupUpdate')->name('userwriterSetupUpdate');
    Route::get('adminDeleteWriterSetup/{theme}/{Writerid}', 'users\UsersThemeConroller@deleteWriter')->name('useradmindeleteWriterSetup');

    // music
    Route::post('adminAddMusicBefore', 'users\UsersThemeConroller@addMusicBefore')->name('useraddMusicBefore');
    Route::post('adminupdateMusicBefore', 'users\UsersThemeConroller@updateMusicBefore')->name('userupdateMusicBefore');
    Route::get('adminDeleteMusicBefore/{theme}', 'users\UsersThemeConroller@deleteMusicBefore')->name('userdeleteMusicBefore');
    Route::post('adminAddMusicOn', 'users\UsersThemeConroller@addMusicOn')->name('useraddMusicOn');
    Route::post('adminupdateMusicOn', 'users\UsersThemeConroller@updateMusicOn')->name('userupdateMusicOn');
    Route::get('adminDeleteMusicOn/{theme}', 'users\UsersThemeConroller@deleteMusicOn')->name('userdeleteMusicOn');
    Route::post('adminAddMusicAfter', 'users\UsersThemeConroller@addMusicAfter')->name('useraddMusicAfter');
    Route::post('adminupdateMusicAfter', 'users\UsersThemeConroller@updateMusicAfter')->name('userupdateMusicAfter');
    Route::get('adminDeleteMusicAfter/{theme}', 'users\UsersThemeConroller@deleteMusicAfter')->name('userdeleteMusicAfter');
    // videos
    Route::post('adminAddVideoBefore', 'users\UsersThemeConroller@addVideoBefore')->name('useraddVideoBefore');
    Route::post('adminupdateVideoBefore', 'users\UsersThemeConroller@updateVideoBefore')->name('userupdateVideoBefore');
    Route::get('adminDeleteVideoBefore/{theme}', 'users\UsersThemeConroller@deleteVideoBefore')->name('userdeleteVideoBefore');
    Route::post('adminAddVideoOn', 'users\UsersThemeConroller@addVideoOn')->name('useraddVideoOn');
    Route::post('adminupdateVideoOn', 'users\UsersThemeConroller@updateVideoOn')->name('userupdateVideoOn');
    Route::get('adminDeleteVideoOn/{theme}', 'users\UsersThemeConroller@deleteVideoOn')->name('userdeleteVideoOn');
    Route::post('adminAddVideoAfter', 'users\UsersThemeConroller@addVideoAfter')->name('useraddVideoAfter');
    Route::post('adminupdateVideoAfter', 'users\UsersThemeConroller@updateVideoAfter')->name('userupdateVideoAfter');
    Route::get('adminDeleteVideoAfter/{theme}', 'users\UsersThemeConroller@deleteVideoAfter')->name('userdeleteVideoAfter');
    //

    // image sliders
    Route::post('adminAddImageSliders', 'users\UsersThemeConroller@adminAddImageSliders')->name('useradminAddImageSliders');
    Route::get('adminDeleteImageSliderSetupe/{theme}/{id}', 'users\UsersThemeConroller@deleteImageSlider')->name('useradmindeleteImageSliderSetup');

    // payment with paystack
    Route::post('/userpay', 'users\PaymentController@redirectToGateway')->name('userpay');
    Route::get('/payment/callback', 'users\PaymentController@handleGatewayCallback')->name('paymentCallback');
    
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
    Route::get('theme/{id}/preview', 'admin\themeController@previewTemplate')->name("previewTemplate");
    //    carousel
    Route::post('adminCarouselSetupt', 'admin\themeController@addCarousel')->name('templateAddCarouselSetup');
    Route::patch('adminCarouselSetupUpdate', 'admin\themeController@updateCarousel')->name("templateUpdateCarouselSetup");
    Route::get('adminDeleteCarouseSetup/{theme}/{carouselid}', 'admin\themeController@deleteCarousel')->name('admindeleteCarouselSetup');
    // template/theme
    Route::post('activateTheme', 'admin\themeController@activateTheme')->name('activateTheme');
    Route::get('/deactivate-theme/{id}', 'admin\themeController@themeDisable')->name("themeDisable");
    Route::get("/setup/{id}/{themename}", 'admin\themeController@presetup')->name('themePreset');
    Route::resource('template', 'admin\templateController');
    Route::get('theme-view', 'admin\themeController@themePreview')->name('themePreview');
    // writer adminDateSetup
    Route::post('adminWriterSetup', 'admin\themeController@writerSetup')->name('adminWriterSetup');
    Route::patch('adminWriterSetupUpdate', 'admin\themeController@writerSetupUpdate')->name('writerSetupUpdate');
    Route::get('adminDeleteWriterSetup/{theme}/{Writerid}', 'admin\themeController@deleteWriter')->name('admindeleteWriterSetup');
    // date adminDateSetup
    Route::post('adminDateSetup', 'admin\themeController@adminDateSetup')->name('adminDateSetup');
    Route::patch('adminWriterSetupUpdate', 'admin\themeController@writerSetupUpdate')->name('writerSetupUpdate');
    Route::get('adminDeleteWriterSetup/{theme}/{Writerid}', 'admin\themeController@deleteWriter')->name('admindeleteWriterSetup');

    // music
    Route::post('adminAddMusicBefore', 'admin\themeController@addMusicBefore' )->name('addMusicBefore');
    Route::post('adminupdateMusicBefore', 'admin\themeController@updateMusicBefore')->name('updateMusicBefore');
    Route::get('adminDeleteMusicBefore/{theme}', 'admin\themeController@deleteMusicBefore')->name('deleteMusicBefore');
    Route::post('adminAddMusicOn', 'admin\themeController@addMusicOn')->name('addMusicOn');
    Route::post('adminupdateMusicOn', 'admin\themeController@updateMusicOn')->name('updateMusicOn');
    Route::get('adminDeleteMusicOn/{theme}', 'admin\themeController@deleteMusicOn')->name('deleteMusicOn');
    Route::post('adminAddMusicAfter', 'admin\themeController@addMusicAfter')->name('addMusicAfter');
    Route::post('adminupdateMusicAfter', 'admin\themeController@updateMusicAfter')->name('updateMusicAfter');
    Route::get('adminDeleteMusicAfter/{theme}', 'admin\themeController@deleteMusicAfter')->name('deleteMusicAfter');
    // videos
    Route::post('adminAddVideoBefore', 'admin\themeController@addVideoBefore')->name('addVideoBefore');
    Route::post('adminupdateVideoBefore', 'admin\themeController@updateVideoBefore')->name('updateVideoBefore');
    Route::get('adminDeleteVideoBefore/{theme}', 'admin\themeController@deleteVideoBefore')->name('deleteVideoBefore');
    Route::post('adminAddVideoOn', 'admin\themeController@addVideoOn')->name('addVideoOn');
    Route::post('adminupdateVideoOn', 'admin\themeController@updateVideoOn')->name('updateVideoOn');
    Route::get('adminDeleteVideoOn/{theme}', 'admin\themeController@deleteVideoOn')->name('deleteVideoOn');
    Route::post('adminAddVideoAfter', 'admin\themeController@addVideoAfter')->name('addVideoAfter');
    Route::post('adminupdateVideoAfter', 'admin\themeController@updateVideoAfter')->name('updateVideoAfter');
    Route::get('adminDeleteVideoAfter/{theme}', 'admin\themeController@deleteVideoAfter')->name('deleteVideoAfter');
//

    // image sliders
    Route::post('adminAddImageSliders', 'admin\themeController@adminAddImageSliders')->name('adminAddImageSliders');

    Route::get('adminDeleteImageSliderSetupe/{theme}/{id}', 'admin\themeController@deleteImageSlider')->name('admindeleteImageSliderSetup');




});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');