<?php
//namespace App\Http\Controllers;
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
/**
 * /Clear Cache facade value:
 */
use App\Http\Controllers\SocialiteLoginController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});


/**
 * /Reoptimized class loader:
 */
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

/**
 * /Route cache:
 */
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

/**
 *
 * /Clear Route cache:
 */
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

/**
 *
 * /Clear View cache:
 */
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

/**
 * / Config cache:
 */
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Config cleared</h1>';
});

/**
 * /Clear Config cache:
 */
Route::get('/config-clear', function () {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});

/**
 * Run Schedule:
 */
Route::get('/schedule-run', function () {
    $exitCode = Artisan::call('schedule:run');
    return '<h1>Schedule is Ran</h1>';
});
Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Schedule is Ran</h1>';
});


/**
 * DB: Backup:
 */
Route::get('/db-backup', function () {
    $exitCode = Artisan::call('db:backup');
    return '<h1>Schedule is Ran</h1>';
});

/**
 * Authentication route
 */

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('dcms.login');
// Route::get('dcms/login', function(){
//     return view('dcms.auth.login');
// });
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('user/login/facebook', [SocialiteLoginController::class, 'redirectToFacebook'])->name('user.login.facebook');
Route::get('user/login/facebook/callback', [SocialiteLoginController::class, 'handleFacebookCallback']);

Route::get('user/login/google', [SocialiteLoginController::class, 'redirectToGoogle'])->name('user.login.google');
Route::get('user/login/google/callback', [SocialiteLoginController::class, 'handleGoogleCallback']);
/**
 *
 * Registration Routes...
 * */
// Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::post('user/register',         [App\Http\Controllers\UserController::class, 'registerUser'])->name('signup-process');
Route::post('user/login',         [App\Http\Controllers\UserController::class, 'login'])->name('login-process');

/**
 * / Password Reset Routes...
 */
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('password/resetform', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.resetform');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/request/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request.token');
Route::post('password/update', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 * 404 redirect routes
 */
Route::get('login', function () {
    return view('dcms.404'); });
Route::get('register', function () {
    return view('dcms.404'); });
/**
 *
 * Admin Panel route (Dashboard)
 */

Route::group(['prefix' => 'dashboard', 'as' => 'dcms.', 'namespace' => 'Dcms', 'middleware' => ['auth', 'status']], function () {
    /**
     * Swap Language
     */
    Route::get('/swap/language/{lang_id}', ['as' => 'swap_language', 'uses' => 'HomeController@swapLanguage']);
    /**'
     * Dashboard route
     */
    Route::get('', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    /**
     * Page Routes
     */
    Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PostsController@indexPage']);
        Route::get('create', ['as' => 'create', 'uses' => 'PostsController@createPage']);
        Route::post('', ['as' => 'store', 'uses' => 'PostsController@storePage']);
        Route::get('{page}/edit', ['as' => 'edit', 'uses' => 'PostsController@editPage']);
        Route::put('{page}', ['as' => 'update', 'uses' => 'PostsController@updatePage']);
        Route::delete('{page}', ['as' => 'destroy', 'uses' => 'PostsController@destroy']);
        Route::delete('file/{page}', ['as' => 'destroyFile', 'uses' => 'PostsController@destroyFile']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'PostsController@deletedPage']);
        Route::put('restore/{post}', ['as' => 'restore', 'uses' => 'PostsController@restore']);
        Route::delete('permanent_delete/{post}', ['as' => 'delete', 'uses' => 'PostsController@permanentDelete']);
        /**Feature Page */
        Route::get('featured', ['as' => 'featured', 'uses' => 'PostsController@featuredPage']);
        Route::post('order', ['as' => 'order', 'uses' => 'PostsController@storeOrder']);
        

    });
    /**
     * post routes
     */
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PostsController@indexPost']);
        Route::get('create', ['as' => 'create', 'uses' => 'PostsController@createPost']);
        Route::post('store', ['as' => 'store', 'uses' => 'PostsController@storePost']);
        Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'PostsController@editPost']);
        Route::put('{post}', ['as' => 'update', 'uses' => 'PostsController@updatePost']);
        Route::delete('{post}', ['as' => 'destroy', 'uses' => 'PostsController@destroy']);
        Route::delete('file/{post}', ['as' => 'destroyFile', 'uses' => 'PostsController@destroyFile']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'PostsController@deletedPost']);
        Route::put('restore/{post}', ['as' => 'restore', 'uses' => 'PostsController@restore']);
        Route::delete('permanent_delete/{post}', ['as' => 'delete', 'uses' => 'PostsController@permanentDelete']);
        // Multiple image delete
        Route::get('delete/{id}', ['as' => 'delete_image', 'uses' => 'PostsController@delete_multiple_image']);

    });
    /**
     * Category Route
     */
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'CategoriesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CategoriesController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'CategoriesController@store']);
        Route::get('{category}/edit', ['as' => 'edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{category}', ['as' => 'update', 'uses' => 'CategoriesController@update']);
        Route::delete('{category}', ['as' => 'destroy', 'uses' => 'CategoriesController@destroy']);
        /** Category Nestable Order */
        Route::post('order', ['as' => 'order', 'uses' => 'CategoriesController@storeOrder']);
    });
    /**
     * slider Routes
     */
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'SlidersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'SlidersController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'SlidersController@store']);
        Route::get('{slider}/edit', ['as' => 'edit', 'uses' => 'SlidersController@edit']);
        Route::put('{slider}', ['as' => 'update', 'uses' => 'SlidersController@update']);
        Route::delete('{slider}', ['as' => 'destroy', 'uses' => 'SlidersController@destroy']);
    });
    /**
     * User Profile Routes
     */
    Route::group(['prefix' => 'user_profile', 'as' => 'user_profile.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'UsersProfileController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'UsersProfileController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'UsersProfileController@store']);
        Route::get('show', ['as' => 'show', 'uses' => 'UsersProfileController@show']);
        Route::get('edit', ['as' => 'edit', 'uses' => 'UsersProfileController@edit']);
        Route::put('', ['as' => 'update', 'uses' => 'UsersProfileController@update']);
        Route::delete('', ['as' => 'destroy', 'uses' => 'UsersProfileController@destroy']);
        Route::post('', ['as' => 'password.change', 'uses' => 'UsersProfileController@changePassword']);
    });

    /**
     * User Messages
     *
     */
    Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ContactsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ContactsController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'ContactsController@store']);
        Route::get('{message}/show', ['as' => 'show', 'uses' => 'ContactsController@show']);
        Route::get('{message}/edit', ['as' => 'edit', 'uses' => 'ContactsController@edit']);
        Route::put('{message}', ['as' => 'update', 'uses' => 'ContactsController@update']);
        Route::delete('{message}', ['as' => 'destroy', 'uses' => 'ContactsController@destroy']);
    });

    /**
     * Donate Now
     *
     */
    Route::group(['prefix' => 'donate_now', 'as' => 'donate_now.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'DonateNowController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'DonateNowController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'DonateNowController@store']);
        Route::get('{donate_now}/show', ['as' => 'show', 'uses' => 'DonateNowController@show']);
        Route::get('{donate_now}/edit', ['as' => 'edit', 'uses' => 'DonateNowController@edit']);
        Route::put('{donate_now}', ['as' => 'update', 'uses' => 'DonateNowController@update']);
        Route::delete('{donate_now}', ['as' => 'destroy', 'uses' => 'DonateNowController@destroy']);
    });
    /**
     * Admission 
     *
     */
    Route::group(['prefix' => 'admission', 'as' => 'admission.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'AdmissionController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdmissionController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'AdmissionController@store']);
        Route::get('{admission}/show', ['as' => 'show', 'uses' => 'AdmissionController@show']);
        Route::get('{admission}/edit', ['as' => 'edit', 'uses' => 'AdmissionController@edit']);
        Route::put('{admission}', ['as' => 'update', 'uses' => 'AdmissionController@update']);
        Route::delete('{admission}', ['as' => 'destroy', 'uses' => 'AdmissionController@destroy']);
    });
    /**
     * File
     *
     */
    Route::group(['prefix' => 'file', 'as' => 'file.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'FilesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'FilesController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'FilesController@store']);
        Route::get('{file}/show', ['as' => 'show', 'uses' => 'FilesController@show']);
        Route::get('{file}/edit', ['as' => 'edit', 'uses' => 'FilesController@edit']);
        Route::put('{file}', ['as' => 'update', 'uses' => 'FilesController@update']);
        Route::delete('{file}', ['as' => 'destroy', 'uses' => 'FilesController@destroy']);
    });


    Route::group(['prefix' => 'post_image', 'as' => 'post_image.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PostImageController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'PostImageController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'PostImageController@store']);
        Route::get('{file}/show', ['as' => 'show', 'uses' => 'PostImageController@show']);
        Route::get('{file}/edit', ['as' => 'edit', 'uses' => 'PostImageController@edit']);
        Route::put('{file}', ['as' => 'update', 'uses' => 'PostImageController@update']);
        Route::delete('{file}', ['as' => 'destroy', 'uses' => 'PostImageController@destroy']);
    });
    /**
     * Link
     *
     */
    Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'LinksController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'LinksController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'LinksController@store']);
        Route::get('{link}/show', ['as' => 'show', 'uses' => 'LinksController@show']);
        Route::get('{link}/edit', ['as' => 'edit', 'uses' => 'LinksController@edit']);
        Route::put('{link}', ['as' => 'update', 'uses' => 'LinksController@update']);
        Route::delete('{link}', ['as' => 'destroy', 'uses' => 'LinksController@destroy']);
    });

    /**
     * Video
     *
     */
    Route::group(['prefix' => 'video', 'as' => 'video.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'VideoController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'VideoController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'VideoController@store']);
        Route::get('{video}/show', ['as' => 'show', 'uses' => 'VideoController@show']);
        Route::get('{video}/edit', ['as' => 'edit', 'uses' => 'VideoController@edit']);
        Route::put('{video}', ['as' => 'update', 'uses' => 'VideoController@update']);
        Route::delete('{video}', ['as' => 'destroy', 'uses' => 'VideoController@destroy']);
    });

    /**
     * Audio
     *
     */
    Route::group(['prefix' => 'audio', 'as' => 'audio.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'AudioController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'AudioController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'AudioController@store']);
        Route::get('{audio}/show', ['as' => 'show', 'uses' => 'AudioController@show']);
        Route::get('{audio}/edit', ['as' => 'edit', 'uses' => 'AudioController@edit']);
        Route::put('{audio}', ['as' => 'update', 'uses' => 'AudioController@update']);
        Route::delete('{audio}', ['as' => 'destroy', 'uses' => 'AudioController@destroy']);
    });
    /**
     * Central Department
     *
     */
    // Route::group(['prefix' => 'central_department', 'as'=>'central_department.'], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'CentralDepartmentsController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'CentralDepartmentsController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'CentralDepartmentsController@store']);
    //     Route::get('{central_department}/show',                        ['as'=>'show',              'uses'=>'CentralDepartmentsController@show']);
    //     Route::get('{central_department}/edit',                         ['as'=>'edit',              'uses'=>'CentralDepartmentsController@edit']);
    //     Route::put('{central_department}',                             ['as'=>'update',              'uses'=>'CentralDepartmentsController@update']);
    //     Route::delete('{central_department}',                          ['as'=>'destroy',              'uses'=>'CentralDepartmentsController@destroy']);
    // });

    /**
     * Pop Up
     *
     */
    Route::group(['prefix' => 'popup', 'as' => 'popup.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PopupController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'PopupController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'PopupController@store']);
        Route::get('{popup}/show', ['as' => 'show', 'uses' => 'PopupController@show']);
        Route::get('{popup}/edit', ['as' => 'edit', 'uses' => 'PopupController@edit']);
        Route::put('{popup}', ['as' => 'update', 'uses' => 'PopupController@update']);
        Route::delete('{popup}', ['as' => 'destroy', 'uses' => 'PopupController@destroy']);
    });
    /**
     * Advistement
     *
     */
    Route::group(['prefix' => 'advistement', 'as' => 'advistement.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'AdvistementController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'AdvistementController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'AdvistementController@store']);
        Route::get('{advistement}/show', ['as' => 'show', 'uses' => 'AdvistementController@show']);
        Route::get('{advistement}/edit', ['as' => 'edit', 'uses' => 'AdvistementController@edit']);
        Route::put('{advistement}', ['as' => 'update', 'uses' => 'AdvistementController@update']);
        Route::delete('{advistement}', ['as' => 'destroy', 'uses' => 'AdvistementController@destroy']);
    });
    /**
     * Album
     *
     */
    Route::group(['prefix' => 'album', 'as' => 'album.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'AlbumController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'AlbumController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'AlbumController@store']);
        Route::get('{album}/show', ['as' => 'show', 'uses' => 'AlbumController@show']);
        Route::get('{album}/edit', ['as' => 'edit', 'uses' => 'AlbumController@edit']);
        Route::put('{album}', ['as' => 'update', 'uses' => 'AlbumController@update']);
        Route::delete('{album}', ['as' => 'destroy', 'uses' => 'AlbumController@destroy']);
        Route::get('{album}/photo/add', ['as' => 'addPhoto', 'uses' => 'GalleryController@create']);
        Route::post('{album}/photo/store', ['as' => 'storePhoto', 'uses' => 'GalleryController@store']);
    });
    /**
     * Gallery
     *
     */
    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'GalleryController@index']);
        // Route::get('create',                                ['as'=>'create',              'uses'=>'GalleryController@create']);
        // Route::post('',                                     ['as'=>'store',              'uses'=>'GalleryController@store']);
        // Route::get('{gallery}/show',                        ['as'=>'show',              'uses'=>'GalleryController@show']);
        Route::get('{gallery}/edit', ['as' => 'edit', 'uses' => 'GalleryController@edit']);
        Route::put('{gallery}', ['as' => 'update', 'uses' => 'GalleryController@update']);
        Route::delete('{gallery}', ['as' => 'destroy', 'uses' => 'GalleryController@destroy']);
    });
    /**
     *
     * Menu Routes
     */
    Route::group(['prefix' => 'menu', 'as' => 'menu.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'MenusController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'MenusController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'MenusController@store']);
        Route::get('{menu}/edit', ['as' => 'edit', 'uses' => 'MenusController@edit']);
        Route::put('{menu}', ['as' => 'update', 'uses' => 'MenusController@update']);
        Route::delete('{menu}', ['as' => 'destroy', 'uses' => 'MenusController@destroy']);
        /** Menu Nestable Order */
        Route::post('order', ['as' => 'order', 'uses' => 'MenusController@storeOrder']);
    });

    /**
     *
     * Tag Routes
     */
    Route::group(['prefix' => 'tag', 'as' => 'tag.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TagsController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TagsController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'TagsController@store']);
        Route::get('{tag}/edit', ['as' => 'edit', 'uses' => 'TagsController@edit']);
        Route::put('{tag}', ['as' => 'update', 'uses' => 'TagsController@update']);
        Route::delete('{tag}', ['as' => 'destroy', 'uses' => 'TagsController@destroy']);
        /** Tag Nestable Order */
        Route::post('order', ['as' => 'order', 'uses' => 'TagsController@storeOrder']);
    });
    /**
     * Tag post routes
     */
    Route::group(['prefix' => 'tagpost', 'as' => 'tagpost.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TagPostController@indexTagPost']);
        Route::get('create', ['as' => 'create', 'uses' => 'TagPostController@createTagPost']);
        Route::post('store', ['as' => 'store', 'uses' => 'TagPostController@storeTagPost']);
        Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'TagPostController@editTagPost']);
        Route::put('{post}', ['as' => 'update', 'uses' => 'TagPostController@updateTagPost']);
        Route::delete('{post}', ['as' => 'destroy', 'uses' => 'TagPostController@destroy']);
        Route::delete('file/{post}', ['as' => 'destroyFile', 'uses' => 'TagPostController@destroyFile']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'TagPostController@deletedTagPost']);
        Route::put('restore/{post}', ['as' => 'restore', 'uses' => 'TagPostController@restore']);
        Route::delete('permanent_delete/{post}', ['as' => 'delete', 'uses' => 'TagPostController@permanentDelete']);
        Route::get('delete/{id}', ['as' => 'delete_image', 'uses' => 'TagPostController@delete_multiple_image']);

    });
    /**
     *
     * Other Menus Routes
     */
    Route::group(['prefix' => 'other_menus', 'as' => 'other_menus.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'OtherMenusController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'OtherMenusController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'OtherMenusController@store']);
        Route::get('{other}/edit', ['as' => 'edit', 'uses' => 'OtherMenusController@edit']);
        Route::put('{other}', ['as' => 'update', 'uses' => 'OtherMenusController@update']);
        Route::delete('{other}', ['as' => 'destroy', 'uses' => 'OtherMenusController@destroy']);
        /** Tag Nestable Order */
        Route::post('order', ['as' => 'order', 'uses' => 'OtherMenusController@storeOrder']);
    });
    /**
     * Other menu post routes
     */
    Route::group(['prefix' => 'other_menu_post', 'as' => 'other_menu_post.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'OtherMenuPostController@indexOtherMenuPost']);
        Route::get('create', ['as' => 'create', 'uses' => 'OtherMenuPostController@createOtherMenuPost']);
        Route::post('store', ['as' => 'store', 'uses' => 'OtherMenuPostController@storeOtherMenuPost']);
        Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'OtherMenuPostController@editOtherMenuPost']);
        Route::put('{post}', ['as' => 'update', 'uses' => 'OtherMenuPostController@updateOtherMenuPost']);
        Route::delete('{post}', ['as' => 'destroy', 'uses' => 'OtherMenuPostController@destroy']);
        Route::delete('file/{post}', ['as' => 'destroyFile', 'uses' => 'OtherMenuPostController@destroyFile']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'OtherMenuPostController@deletedOtherMenuPost']);
        Route::put('restore/{post}', ['as' => 'restore', 'uses' => 'OtherMenuPostController@restore']);
        Route::delete('permanent_delete/{post}', ['as' => 'delete', 'uses' => 'OtherMenuPostController@permanentDelete']);
        //Route::get('/get-districts', 'OtherMenuPostController@getDistricts')->name('getDistricts');
        Route::get('/districts/{id}', ['as' =>'district',  'uses' => 'OtherMenuPostController@getDistrict']);
        Route::get('delete/{id}', ['as' => 'delete_image', 'uses' => 'OtherMenuPostController@delete_multiple_image']);

    });


    Route::group(['prefix' => 'province_post', 'as' => 'province_post.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ProvincePostController@indexProvincePost']);
        Route::get('create', ['as' => 'create', 'uses' => 'ProvincePostController@createProvincePost']);
        Route::post('store', ['as' => 'store', 'uses' => 'ProvincePostController@storeProvincePost']);
        Route::get('{post}/edit', ['as' => 'edit', 'uses' => 'ProvincePostController@editProvincePost']);
        Route::put('{post}', ['as' => 'update', 'uses' => 'ProvincePostController@updateProvincePost']);
        Route::delete('{post}', ['as' => 'destroy', 'uses' => 'ProvincePostController@destroy']);
        Route::delete('file/{post}', ['as' => 'destroyFile', 'uses' => 'ProvincePostController@destroyFile']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'ProvincePostController@deletedProvincePost']);
        Route::put('restore/{post}', ['as' => 'restore', 'uses' => 'ProvincePostController@restore']);
        Route::delete('permanent_delete/{post}', ['as' => 'delete', 'uses' => 'ProvincePostController@permanentDelete']);
        //Route::get('/get-districts', 'ProvincePostController@getDistricts')->name('getDistricts');
        Route::get('/districts/{id}', ['as' =>'district',  'uses' => 'ProvincePostController@getDistrict']);
        Route::get('delete/{id}', ['as' => 'delete_image', 'uses' => 'ProvincePostController@delete_multiple_image']);

    });
    /**
     *
     * Branch Office Routes
     */
    Route::group(['prefix' => 'branch', 'as' => 'branch.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'BranchesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'BranchesController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'BranchesController@store']);
        Route::get('{branch}/edit', ['as' => 'edit', 'uses' => 'BranchesController@edit']);
        Route::put('{branch}', ['as' => 'update', 'uses' => 'BranchesController@update']);
        Route::delete('{branch}', ['as' => 'destroy', 'uses' => 'BranchesController@destroy']);
        /** Category Nestable Order */
        Route::post('order', ['as' => 'order', 'uses' => 'BranchesController@storeOrder']);
    });
    /**
     * success story Routes
     */
    Route::group(['prefix' => 'success_story', 'as' => 'success_story.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'SuccessStoryController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'SuccessStoryController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'SuccessStoryController@store']);
        Route::get('{success_story}/edit', ['as' => 'edit', 'uses' => 'SuccessStoryController@edit']);
        Route::put('{success_story}', ['as' => 'update', 'uses' => 'SuccessStoryController@update']);
        Route::delete('{success_story}', ['as' => 'destroy', 'uses' => 'SuccessStoryController@destroy']);
    });
    /**
     * Payment Routes
     */
    Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'PaymentController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'PaymentController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'PaymentController@store']);
        Route::get('{success_story}/edit', ['as' => 'edit', 'uses' => 'PaymentController@edit']);
        Route::put('{success_story}', ['as' => 'update', 'uses' => 'PaymentController@update']);
        Route::delete('{success_story}', ['as' => 'destroy', 'uses' => 'PaymentController@destroy']);
    });
    /**
     *
     * Staff Office Routes
     */
    Route::group(['prefix' => 'staff', 'as' => 'staff.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'StaffController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'StaffController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'StaffController@store']);
        Route::get('{staff}/edit', ['as' => 'edit', 'uses' => 'StaffController@edit']);
        Route::put('{staff}', ['as' => 'update', 'uses' => 'StaffController@update']);
        Route::delete('{staff}', ['as' => 'destroy', 'uses' => 'StaffController@destroy']);
        Route::get('get_sort_list', ['as' => 'get_sort', 'uses' => 'StaffController@getSortList']);
        Route::get('get_staffs/{staff}', ['as' => 'get_staff', 'uses' => 'StaffController@getStaffs']);
        Route::post('order', ['as' => 'order', 'uses' => 'StaffController@storeOrder']);
    });
    /**
     * Setting Routes
     */
    Route::group(['as' => 'setting.',], function () {
        Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SettingsController@getAboutDetails']);
            Route::post('{about}', ['as' => 'store', 'uses' => 'SettingsController@updateAboutDetails']);
        });
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SettingsController@getContactDetails']);
            Route::post('{contact}', ['as' => 'store', 'uses' => 'SettingsController@updateContactDetails']);
        });
        Route::group(['prefix' => 'social', 'as' => 'social.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SettingsController@getSocialProfiles']);
            Route::post('{social}', ['as' => 'store', 'uses' => 'SettingsController@updateSocialProfiles']);
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'SettingsController@getGeneralSetting']);
            Route::post('{setting}', ['as' => 'store', 'uses' => 'SettingsController@updateGeneralSetting']);
        });
        Route::group(['prefix' => 'title', 'as' => 'title.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'CommonController@getTitleSetting']);
            Route::put('{title}', ['as' => 'store', 'uses' => 'CommonController@updateTitleSetting']);
        });
        Route::group(['prefix' => 'footer', 'as' => 'footer.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'CommonController@getFooterSetting']);
            Route::put('{footer}', ['as' => 'store', 'uses' => 'CommonController@updateFooterSetting']);
        });
    });
    /**
     * Language route
     */
    Route::group(['prefix' => 'language', 'as' => 'language.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'LanguageController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'LanguageController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'LanguageController@store']);
        Route::get('{language}/edit', ['as' => 'edit', 'uses' => 'LanguageController@edit']);
        Route::put('{language}', ['as' => 'update', 'uses' => 'LanguageController@update']);
        Route::delete('{language}', ['as' => 'destroy', 'uses' => 'LanguageController@destroy']);
        /**Soft Delete Url */
        Route::get('delete_item', ['as' => 'deleted_item', 'uses' => 'LanguageController@deletedLanguage']);
        Route::put('restore/{language}', ['as' => 'restore', 'uses' => 'LanguageController@restore']);
        Route::delete('permanent_delete/{language}', ['as' => 'delete', 'uses' => 'LanguageController@permanentDelete']);
    });
    /**
     * User Routes
     */
    Route::group(['prefix' => 'user', 'as' => 'user.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'UsersController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'UsersController@store']);
        Route::get('{user}/edit', ['as' => 'edit', 'uses' => 'UsersController@edit']);
        Route::get('{user}', ['as' => 'update', 'uses' => 'UsersController@update']);
        Route::delete('{user}', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
    });
    /**
     * User Tracking Routes
     */
    Route::group(['prefix' => 'tracker', 'as' => 'tracker.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'TrackersController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'TrackersController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'TrackersController@store']);
        Route::get('{tracker}/edit', ['as' => 'edit', 'uses' => 'TrackersController@edit']);
        Route::put('{tracker}', ['as' => 'update', 'uses' => 'TrackersController@update']);
        Route::delete('{tracker}', ['as' => 'destroy', 'uses' => 'TrackersController@destroy']);
        Route::get('delete_all', ['as' => 'truncate', 'uses' => 'TrackersController@deleteAll']);
    });
    /**
     * DB backup Routes
     */
    Route::group(['prefix' => 'database', 'as' => 'database.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'DatabasesBackupController@index']);
        Route::get('download', ['as' => 'download', 'uses' => 'DatabasesBackupController@databaseDownload']);
        Route::get('backup', ['as' => 'backup', 'uses' => 'DatabasesBackupController@databaseBackup']);
    });
    /**
     * Data Routes
     */
    Route::group(['prefix' => 'data', 'as' => 'data.',], function () {
        Route::group(['prefix' => 'scholarship', 'as' => 'scholarship.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'DataController@indexScholarship']);
            Route::get('create', ['as' => 'create', 'uses' => 'DataController@createScholarship']);
            Route::post('', ['as' => 'store', 'uses' => 'DataController@storeScholarship']);
            Route::get('{scholarship}/edit', ['as' => 'edit', 'uses' => 'DataController@editScholarship']);
            Route::put('{scholarship}', ['as' => 'update', 'uses' => 'DataController@updateScholarship']);
            Route::delete('{scholarship}', ['as' => 'destroy', 'uses' => 'DataController@destroyScholarship']);
        });
        Route::group(['prefix' => 'national', 'as' => 'national.'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'DataController@indexNational']);
            Route::get('create', ['as' => 'create', 'uses' => 'DataController@createNational']);
            Route::post('', ['as' => 'store', 'uses' => 'DataController@storeNational']);
            Route::get('{national}/edit', ['as' => 'edit', 'uses' => 'DataController@editNational']);
            Route::put('{national}', ['as' => 'update', 'uses' => 'DataController@updateNational']);
            Route::delete('{national}', ['as' => 'destroy', 'uses' => 'DataController@destroyNational']);
        });

        Route::get('', ['as' => 'index', 'uses' => 'DataController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'DataController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'DataController@store']);
        Route::get('{data}/edit', ['as' => 'edit', 'uses' => 'DataController@edit']);
        Route::put('{data}', ['as' => 'update', 'uses' => 'DataController@update']);
        Route::delete('{data}', ['as' => 'destroy', 'uses' => 'DataController@destroy']);
    });

    /**
     * Service Routes
     */
    Route::group(['prefix' => 'service', 'as' => 'service.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ServicesController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'ServicesController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'ServicesController@store']);
        Route::get('{service}/edit', ['as' => 'edit', 'uses' => 'ServicesController@edit']);
        Route::put('{service}', ['as' => 'update', 'uses' => 'ServicesController@update']);
        Route::delete('{service}', ['as' => 'destroy', 'uses' => 'ServicesController@destroy']);
    });

    /**
     * Institute Routes
     */
    // Route::group(['prefix' => 'institute', 'as'=>'institute.',], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedPageController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedPageController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedPageController@store']);
    //     Route::get('{institute}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedPageController@edit']);
    //     Route::put('{institute}',                                ['as'=>'update',              'uses'=>'AffiliatedPageController@update']);
    //     Route::delete('{institute}',                             ['as'=>'destroy',              'uses'=>'AffiliatedPageController@destroy']);
    //     Route::delete('file/{page}',                        ['as'=>'destroyFile',              'uses'=>'AffiliatedPageController@destroyFile']);
    //       /**Soft Delete Url */
    //     Route::get('delete_item',                            ['as'=>'deleted_item',              'uses'=>'AffiliatedPageController@deletedInstitute']);
    //     Route::put('restore/{post}',                                ['as'=>'restore',              'uses'=>'AffiliatedPageController@restore']);
    //     Route::delete('permanent_delete/{institute}',             ['as'=>'delete',              'uses'=>'AffiliatedPageController@permanentDelete']);

    //     Route::get('page',                                           ['as'=>'get_page',              'uses'=>'AffiliatedPageController@getPage']);

    //  // Affiliated User Route
    // Route::group(['prefix' => 'banner', 'as'=>'banner.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedBannersController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedBannersController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedBannersController@store']);
    //     Route::get('{banner}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedBannersController@edit']);
    //     Route::put('{banner}',                                ['as'=>'update',              'uses'=>'AffiliatedBannersController@update']);
    //     Route::delete('{banner}',                             ['as'=>'destroy',              'uses'=>'AffiliatedBannersController@destroy']);
    // });

    // Route::group(['prefix' => 'category', 'as'=>'category.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedProgramCategoryController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedProgramCategoryController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedProgramCategoryController@store']);
    //     Route::get('{category}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedProgramCategoryController@edit']);
    //     Route::put('{category}',                                ['as'=>'update',              'uses'=>'AffiliatedProgramCategoryController@update']);
    //     Route::delete('{category}',                             ['as'=>'destroy',              'uses'=>'AffiliatedProgramCategoryController@destroy']);
    //       /** Category Nestable Order */
    //  Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedProgramCategoryController@storeOrder']);
    // });

    // Route::group(['prefix' => 'program', 'as'=>'program.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedProgramController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedProgramController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedProgramController@store']);
    //     Route::get('{program}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedProgramController@edit']);
    //     Route::put('{program}',                                ['as'=>'update',              'uses'=>'AffiliatedProgramController@update']);
    //     Route::delete('{program}',                             ['as'=>'destroy',              'uses'=>'AffiliatedProgramController@destroy']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedProgramController@storeOrder']);
    // });

    // Route::group(['prefix' => 'campus', 'as'=>'campus.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedCollageController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedCollageController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedCollageController@store']);
    //     Route::get('{campus}/edit',                         ['as'=>'edit',              'uses'=>'AffiliatedCollageController@edit']);
    //     Route::put('{campus}',                              ['as'=>'update',              'uses'=>'AffiliatedCollageController@update']);
    //     Route::delete('{campus}',                           ['as'=>'destroy',              'uses'=>'AffiliatedCollageController@destroy']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedCollageController@storeOrder']);
    // });

    // Route::group(['prefix' => 'staff', 'as'=>'staff.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedStaffController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedStaffController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedStaffController@store']);
    //     Route::get('{staff}/edit',                         ['as'=>'edit',              'uses'=>'AffiliatedStaffController@edit']);
    //     Route::put('{staff}',                              ['as'=>'update',              'uses'=>'AffiliatedStaffController@update']);
    //     Route::delete('{staff}',                           ['as'=>'destroy',              'uses'=>'AffiliatedStaffController@destroy']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedStaffController@storeOrder']);
    // });

    // });

    /**
     * Faculty Routes
     */
    // Route::group(['prefix' => 'faculty', 'as'=>'faculty.',], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedPageController@indexFaculty']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedPageController@createFaculty']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedPageController@storeFaculty']);
    //     Route::get('{faculty}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedPageController@editFaculty']);
    //     Route::put('{faculty}',                                ['as'=>'update',              'uses'=>'AffiliatedPageController@updateFaculty']);
    //     Route::delete('{faculty}',                             ['as'=>'destroy',              'uses'=>'AffiliatedPageController@destroyFaculty']);
    //     Route::delete('file/{page}',                        ['as'=>'destroyFile',              'uses'=>'AffiliatedPageController@destroyFile']);
    //       /**Soft Delete Url */
    //     Route::get('delete_item',                            ['as'=>'deleted_item',              'uses'=>'AffiliatedPageController@deletedFaculty']);
    //     Route::put('restore/{post}',                                ['as'=>'restore',              'uses'=>'AffiliatedPageController@restore']);
    //     Route::delete('permanent_delete/{faculty}',             ['as'=>'delete',              'uses'=>'AffiliatedPageController@permanentDelete']);

    //     Route::get('page',                                           ['as'=>'get_page',              'uses'=>'AffiliatedPageController@getPage']);

    //      // Affiliated User Route
    //     Route::group(['prefix' => 'banner', 'as'=>'banner.', ], function () {
    //         Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedBannersController@indexBanner']);
    //         Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedBannersController@createBanner']);
    //         Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedBannersController@storeBanner']);
    //         Route::get('{banner}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedBannersController@editBanner']);
    //         Route::put('{banner}',                                ['as'=>'update',              'uses'=>'AffiliatedBannersController@updateBanner']);
    //         Route::delete('{banner}',                             ['as'=>'destroy',              'uses'=>'AffiliatedBannersController@destroyBanner']);
    //     });

    //     Route::group(['prefix' => 'category', 'as'=>'category.', ], function () {
    //         Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedProgramCategoryController@index']);
    //         Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedProgramCategoryController@create']);
    //         Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedProgramCategoryController@store']);
    //         Route::get('{category}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedProgramCategoryController@edit']);
    //         Route::put('{category}',                                ['as'=>'update',              'uses'=>'AffiliatedProgramCategoryController@update']);
    //         Route::delete('{category}',                             ['as'=>'destroy',              'uses'=>'AffiliatedProgramCategoryController@destroy']);
    //           /** Category Nestable Order */
    //      Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedProgramCategoryController@storeOrder']);
    //     });

    // Route::group(['prefix' => 'program', 'as'=>'program.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedProgramController@indexProgram']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedProgramController@createProgram']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedProgramController@storeProgram']);
    //     Route::get('{program}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedProgramController@editProgram']);
    //     Route::put('{program}',                                ['as'=>'update',              'uses'=>'AffiliatedProgramController@updateProgram']);
    //     Route::delete('{program}',                             ['as'=>'destroy',              'uses'=>'AffiliatedProgramController@destroyProgram']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedProgramController@storeOrder']);
    // });

    // Route::group(['prefix' => 'campus', 'as'=>'campus.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedCollageController@indexCampus']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedCollageController@createCampus']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedCollageController@storeCampus']);
    //     Route::get('{campus}/edit',                         ['as'=>'edit',              'uses'=>'AffiliatedCollageController@editCampus']);
    //     Route::put('{campus}',                              ['as'=>'update',              'uses'=>'AffiliatedCollageController@updateCampus']);
    //     Route::delete('{campus}',                           ['as'=>'destroy',              'uses'=>'AffiliatedCollageController@destroyCampus']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedCollageController@storeOrder']);
    // });

    //     Route::group(['prefix' => 'staff', 'as'=>'staff.', ], function () {
    //         Route::get('',                                      ['as'=>'index',              'uses'=>'AffiliatedStaffController@indexStaff']);
    //         Route::get('create',                                ['as'=>'create',              'uses'=>'AffiliatedStaffController@createStaff']);
    //         Route::post('',                                     ['as'=>'store',              'uses'=>'AffiliatedStaffController@storeStaff']);
    //         Route::get('{staff}/edit',                         ['as'=>'edit',              'uses'=>'AffiliatedStaffController@editStaff']);
    //         Route::put('{staff}',                              ['as'=>'update',              'uses'=>'AffiliatedStaffController@updateStaff']);
    //         Route::delete('{staff}',                           ['as'=>'destroy',              'uses'=>'AffiliatedStaffController@destroyStaff']);
    //           /** program Nestable Order */
    //         // Route::post('order',                                ['as'=>'order',              'uses'=>'AffiliatedStaffController@storeOrder']);
    //     });

    // });
    // Affiliated User Route
    // Route::group(['prefix' => 'institute', 'as'=>'institute.', ], function () {
    //     Route::get('{institute}/edit',                           ['as'=>'edit',              'uses'=>'AffiliatedPageController@edit']);
    //     Route::put('{institute}',                                ['as'=>'update',              'uses'=>'AffiliatedPageController@update']);
    //     Route::delete('file/{page}',                        ['as'=>'destroyFile',              'uses'=>'AffiliatedPageController@destroyFile']);
    //     Route::get('page',                                           ['as'=>'get_page',              'uses'=>'AffiliatedPageController@getPage']);
    // });

    // Role Route

    Route::group(['prefix' => 'role', 'as' => 'role.',], function () {
        Route::get('', ['as' => 'index', 'uses' => 'RoleController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'RoleController@create']);
        Route::post('', ['as' => 'store', 'uses' => 'RoleController@store']);
        Route::get('{role}/edit', ['as' => 'edit', 'uses' => 'RoleController@edit']);
        Route::put('{role}', ['as' => 'update', 'uses' => 'RoleController@update']);
        Route::delete('{role}', ['as' => 'destroy', 'uses' => 'RoleController@destroy']);
        Route::get('assign_permission/{id}', ['as' => 'assign', 'uses' => 'RoleController@assignPermission']);
        Route::post('assign_permission/update/{id}', ['as' => 'assign.update', 'uses' => 'RoleController@updateAssignPermission']);
    });

    // Route::group(['prefix' => 'permission', 'as'=>'permission.', ], function () {
    //     Route::get('',                                          ['as'=>'index',              'uses'=>'PermissionController@index']);
    //     // Route::get('create',                                    ['as'=>'create',              'uses'=>'PermissionController@create']);
    //     // Route::post('',                                         ['as'=>'store',              'uses'=>'PermissionController@store']);
    //     // Route::get('{permission}/edit',                         ['as'=>'edit',              'uses'=>'PermissionController@edit']);
    //     // Route::put('{permission}',                              ['as'=>'update',              'uses'=>'PermissionController@update']);
    //     // Route::delete('{permission}',                           ['as'=>'destroy',              'uses'=>'PermissionController@destroy']);
    // });


    // /** Journal */
    // Route::group(['prefix' => 'journal', 'as'=>'journal.'], function () {
    //         Route::get('',                                      ['as'=>'index',              'uses'=>'JournalContentController@index']);
    //         Route::get('create',                                ['as'=>'create',              'uses'=>'JournalContentController@create']);
    //         Route::post('',                                     ['as'=>'store',              'uses'=>'JournalContentController@store']);
    //         Route::get('{journal}/edit',                       ['as'=>'edit',              'uses'=>'JournalContentController@edit']);
    //         Route::put('{journal}',                            ['as'=>'update',              'uses'=>'JournalContentController@update']);
    //         Route::delete('{journal}',                         ['as'=>'destroy',              'uses'=>'JournalContentController@destroy']);
    //         Route::delete('file/{page}',                        ['as'=>'destroyFile',              'uses'=>'JournalContentController@destroyFile']);

    //     /**
    //      * Category Route
    //      */
    //     Route::group(['prefix' => 'category', 'as'=>'category.'], function () {
    //         Route::get('',                                      ['as'=>'index',              'uses'=>'JournalCategoryController@index']);
    //         Route::get('create',                                ['as'=>'create',              'uses'=>'JournalCategoryController@create']);
    //         Route::post('',                                     ['as'=>'store',              'uses'=>'JournalCategoryController@store']);
    //         Route::get('{category}/edit',                       ['as'=>'edit',              'uses'=>'JournalCategoryController@edit']);
    //         Route::put('{category}',                            ['as'=>'update',              'uses'=>'JournalCategoryController@update']);
    //         Route::delete('{category}',                         ['as'=>'destroy',              'uses'=>'JournalCategoryController@destroy']);
    //         /** Category Nestable Order */
    //         Route::post('order',                                ['as'=>'order',              'uses'=>'JournalCategoryController@storeOrder']);
    //     });

    //     /**
    //      * File
    //      *
    //      */
    // Route::group(['prefix' => 'file', 'as'=>'file.'], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'JournalFileController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'JournalFileController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'JournalFileController@store']);
    //     Route::get('{file}/show',                        ['as'=>'show',              'uses'=>'JournalFileController@show']);
    //     Route::get('{file}/edit',                        ['as'=>'edit',              'uses'=>'JournalFileController@edit']);
    //     Route::put('{file}',                             ['as'=>'update',              'uses'=>'JournalFileController@update']);
    //     Route::delete('{file}',                          ['as'=>'destroy',              'uses'=>'JournalFileController@destroy']);
    //     Route::get('download/{file}',                     ['as' => 'download',         'uses'=>'JournalFileController@download']);
    // });
    //});

    // Route::group(['prefix' => 'campus', 'as'=>'campus.', ], function () {
    //     Route::get('',                                      ['as'=>'index',              'uses'=>'CampusesController@index']);
    //     Route::get('create',                                ['as'=>'create',              'uses'=>'CampusesController@create']);
    //     Route::post('',                                     ['as'=>'store',              'uses'=>'CampusesController@store']);
    //     Route::get('{campus}/edit',                         ['as'=>'edit',              'uses'=>'CampusesController@edit']);
    //     Route::put('{campus}',                              ['as'=>'update',              'uses'=>'CampusesController@update']);
    //     Route::delete('{campus}',                           ['as'=>'destroy',              'uses'=>'CampusesController@destroy']);
    //       /** program Nestable Order */
    //     // Route::post('order',                                ['as'=>'order',              'uses'=>'CampusesController@storeOrder']);
    // });

    /**
     * Category Route
     */
    //     Route::group(['prefix' => 'province', 'as'=>'province.'], function () {
//         Route::get('',                                      ['as'=>'index',              'uses'=>'ProvincesController@index']);
//         Route::get('create',                                ['as'=>'create',              'uses'=>'ProvincesController@create']);
//         Route::post('',                                     ['as'=>'store',              'uses'=>'ProvincesController@store']);
//         Route::get('{province}/edit',                       ['as'=>'edit',              'uses'=>'ProvincesController@edit']);
//         Route::put('{province}',                            ['as'=>'update',              'uses'=>'ProvincesController@update']);
//         Route::delete('{province}',                         ['as'=>'destroy',              'uses'=>'ProvincesController@destroy']);
//         /** Category Nestable Order */
//          Route::post('order',                                ['as'=>'order',              'uses'=>'ProvincesController@storeOrder']);
//     });
});

/**
 * site route
 */

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    /**
     * Route for home page
     */
    //Route::get('', site\SiteController::class. '@index')->name('index');
    Route::get('', ['as' => 'index', 'uses' => 'SiteController@index']);
    /**
     * Route To show Post
     */
    Route::get('/post/{post}', ['as' => 'post.show', 'uses' => 'SiteController@showPost']);
    /**
     * Route For Page Show
     */
    Route::get('/page/{page}', ['as' => 'page.show', 'uses' => 'SiteController@showPage']);
    /**
     * Route For all Category Based Pages
     */
    Route::get('/category/{category}', ['as' => 'category.show', 'uses' => 'SiteController@showCategoryPost']);
    /**
     * Route To show Post
     */
    Route::get('/tag/{tag}', ['as' => 'trending.show', 'uses' => 'SiteController@showTagPost']);
    /**
     * Route To show Post
     */
    Route::get('/other/{other_menu}', ['as' => 'rajniti.show', 'uses' => 'SiteController@showOtherPost']);
    /**
     * Route to download Files
     */
    /**
     * Route To show Post
     */
    Route::get('/other_post/{post}', ['as' => 'other.post.show', 'uses' => 'SiteController@showOtherSinglePost']);

    Route::get('/tag_post/{post}', ['as' => 'tag.post.show', 'uses' => 'SiteController@showTagSinglePost']);

    Route::get('/branch_post/{id}', ['as' => 'branch.post.show', 'uses' => 'SiteController@showBranchPost']);

    Route::get('/download/{download}', ['as' => 'file.download', 'uses' => 'SiteController@downloadFile']);
    /**
     * Route for contact Page
     */
    Route::get('/contact', ['as' => 'contact', 'uses' => 'SiteController@showContact']);
    /**
     * Route for contact Page
     */
    Route::get('/unicode', ['as' => 'unicode', 'uses' => 'SiteController@Unicode']);
    /**
     * Route for contact Page
     */
    Route::post('/message', ['as' => 'message', 'uses' => 'SiteController@storeMessage']);
    /**
     * Route for video Page
     */
    Route::get('/video', ['as' => 'video', 'uses' => 'SiteController@showVideo']);
    /**
     * Staff
     */
    Route::get('/member', ['as' => 'staff', 'uses' => 'SiteController@showStaff']);
    /**
     * Post archive
     */
    Route::get('/post', ['as' => 'post', 'uses' => 'SiteController@showAllPost']);
    /**
     * Page archive
     */
    Route::get('/page', ['as' => 'page', 'uses' => 'SiteController@showAllPage']);
    /**
     * Category archive
     */
    // Route::get('/category',                          ['as' => 'category',        'uses' => 'SiteController@showAllCategory']);
    /**
     * Album
     */
    Route::get('/album', ['as' => 'album', 'uses' => 'SiteController@showAlbum']);
    /**
     * Album Show
     */
    Route::get('/album/{album}/show', ['as' => 'album.show', 'uses' => 'SiteController@showPhotos']);

    /**Search */

    Route::get('/search', ['as' => 'search', 'uses' => 'SiteController@search']);
    /**
     * Swap Language
     */
    Route::get('/swap/language/{lang_id}', ['as' => 'swap_language', 'uses' => 'SiteController@swapLanguage']);

    /** Institute Page */
    Route::get('/institute/{institute}', ['as' => 'institute', 'uses' => 'SiteController@showInstitute']);

    Route::get('/institute', ['as' => 'institute.all', 'uses' => 'SiteController@showAllInstitute']);

    /** Faculty Page */
    Route::get('/faculty/{faculty}', ['as' => 'faculty', 'uses' => 'SiteController@showFaculty']);

    Route::get('/faculty', ['as' => 'faculty.all', 'uses' => 'SiteController@showAllFaculty']);

    /*** Featured Staff */
    Route::get('/tu_authorities', ['as' => 'authorities', 'uses' => 'SiteController@showFeaturedMember']);

    /***Collages */
    Route::get('collage/{collage}', ['as' => 'show.collage', 'uses' => 'SiteController@showCollage']);

    /** Constituent Collage */
    Route::get('campuses', ['as' => 'constituent', 'uses' => 'SiteController@showCampuses']);

    /*** Affiliated Collages */
    Route::get('affiliated_campuses', ['as' => 'affiliated', 'uses' => 'SiteController@showAffiliatedCampuses']);

    /** Central Department  */
    Route::get('central_department', ['as' => 'link', 'uses' => 'SiteController@getLinks']);

    Route::get('journal_category/{journal}', ['as' => 'journal.category.show', 'uses' => 'SiteController@showCategoryJournal']);

    Route::get('journal/{journal}', ['as' => 'journal', 'uses' => 'SiteController@showJournal']);

    Route::get('branch/{branch}', ['as' => 'branch', 'uses' => 'SiteController@showBranch']);

    /**
     * Route to download Files
     */
    Route::get('journal/download/{download}', ['as' => 'journal.file.download', 'uses' => 'SiteController@downloadJournalFile']);
    /**Provinces */

    Route::get('/provinces', ['as' => 'provinces', 'uses' => 'SiteController@showPradesh']);

    Route::get('/jilla', ['as' => 'jilla', 'uses' => 'SiteController@showJilla']);

    Route::get('/district/{district_id}', ['as' => 'singleDistrict', 'uses' => 'SiteController@showSingleDistrict']);

    Route::get('/province_post/{post}', ['as' => 'province.post.show', 'uses' => 'SiteController@showProvinceSinglePost']);

    Route::post('/post_review', ['as' => 'postreview', 'uses' => 'SiteController@storeReview']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});




