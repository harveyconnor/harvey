<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/youtube/{channel}', 'YouTubeController@index')->name('youtube.index');
//Route::get('/youtube/{channel}/goal', 'YouTubeController@goal')->name('youtube.index');
Route::get('/youtube/{channel}/theme', 'YouTubeController@indexThemed')->name('youtube.theme');
Route::get('/youtube/{channel}/data', 'YouTubeController@getChannelData')->name('youtube.data');
Route::get('/youtube/{channel}/live', 'YouTubeController@subscriberCount')->name('youtube.live');

//Route::get('/gallery/web', function () {
//    return view('gallery.web');
//})->name('gallery.web');

Route::get('/gallery/graphics', 'GalleryController@showGraphics')->name('gallery.graphics');
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/gallery/graphics/new', 'GalleryController@showGraphicsForm')->name('gallery.graphics.new');
    Route::post('/gallery/graphics/new', 'GalleryController@submitGraphics')->name('gallery.graphics.submit');
});
