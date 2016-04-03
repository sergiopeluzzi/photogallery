<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::group(['middleware' => 'auth.basic'], function() {
    // Album Routes
    Route::get('/', ['as' => 'index','uses' => 'AlbumsController@getList']);
    Route::get('/createalbum', ['as' => 'create_album_form','uses' => 'AlbumsController@getForm']);
    Route::post('/createalbum', ['as' => 'create_album','uses' => 'AlbumsController@postCreate']);
    Route::get('/deletealbum/{id}', ['as' => 'delete_album','uses' => 'AlbumsController@getDelete']);
    Route::get('/album/{id}', ['as' => 'show_album','uses' => 'AlbumsController@getAlbum']);

// Image Routes
    Route::get('/addimage/{id}', ['as' => 'add_image','uses' => 'ImagesController@getForm']);
    Route::post('/addimage', ['as' => 'add_image_to_album','uses' => 'ImagesController@postAdd']);
    Route::get('/deleteimage/{id}', ['as' => 'delete_image','uses' => 'ImagesController@getDelete']);
    Route::post('/moveimage', ['as' => 'move_image', 'uses' => 'ImagesController@postMove']);
//});
// Galery Routes
Route::get('/gallery', ['as' => 'gallery','uses' => 'ImagesController@getGallery']);
Route::get('/gallery/{id}', ['as' => 'photo_gallery','uses' => 'ImagesController@getPhotoGallery']);

// Login Routes
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);