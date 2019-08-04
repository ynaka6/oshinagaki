<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login')->uses('Api\Auth\LoginController@login')->name('login');
Route::post('logout')->uses('Api\Auth\LoginController@logout')->name('logout');
Route::get('user', function() {
    return Auth::user();
})->name('my');


Route::group(['middleware' => 'auth'], function () {
    Route::get('wallpapers')->uses('Api\WallpaperController@index')->name('index');
    Route::group(['prefix' => 'wallpaper', 'as' => 'wallpaper.'], function () {
        Route::get('count')->uses('Api\WallpaperController@count')->name('count');
        Route::post('upload')->uses('Api\WallpaperController@upload')->name('upload');
        Route::post('{wallpaper}/update')->uses('Api\WallpaperController@update')->name('update');
    });

    Route::get('fonts')->uses('Api\FontController@index')->name('index');
    Route::group(['prefix' => 'font', 'as' => 'font.'], function () {
        Route::get('count')->uses('Api\FontController@count')->name('count');
    });
    
    Route::get('menus')->uses('Api\MenuController@index')->name('index');
    Route::group(['prefix' => 'menu', 'as' => 'menu.'], function () {
        Route::get('count')->uses('Api\MenuController@count')->name('count');
        Route::post('create')->uses('Api\MenuController@create')->name('create');
        Route::get('{menu}')->uses('Api\MenuController@show')->name('show');
        Route::post('{menu}/update')->uses('Api\MenuController@update')->name('update');
    });
});