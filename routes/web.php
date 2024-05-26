<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/picture', function () {
    return view('picture');
});
Route::resource('album', AlbumController::class);
Route::resource('', AlbumController::class);
Route::resource('picture', PictureController::class);


Route::get('deletealbum', 'AlbumController@destroy');
Route::get('selectalbum', 'AlbumController@selectalbum');
Route::get('editalbum', 'AlbumController@update');
Route::get('addalbum', 'AlbumController@store');
Route::get('deletepicture', 'PictureController@destroy');
Route::get('movepic', 'PictureController@move');
Route::get('addpicture', 'PictureController@create');
Route::post('upload', 'PictureController@store');
Route::get('deletealbumpicture', 'PictureController@destroyallalbum');
Route::get('editpicture', 'PictureController@update');
Route::delete('upload', 'PictureController@delete');





