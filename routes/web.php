<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

//Route::get('/gallery/web', function () {
//    return view('gallery.web');
//})->name('gallery.web');

Route::get('/gallery/graphics', 'GalleryController@showGraphics')->name('gallery.graphics');
//Auth::routes();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/gallery/graphics/new', 'GalleryController@showGraphicsForm')->name('gallery.graphics.new');
    Route::post('/gallery/graphics/new', 'GalleryController@submitGraphics')->name('gallery.graphics.submit');
});
