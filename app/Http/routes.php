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

