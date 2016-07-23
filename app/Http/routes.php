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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'paper'], function () {
    Route::get('/', 'PaperController@index');
    Route::get('/allvenue', 'PaperController@allvenue');
    Route::get('/venue', 'PaperController@venue');
    Route::get('/paper','PaperController@paper');
    Route::get('/keyword','PaperController@keyword');
});


Route::post('/excel', 'UploadController@uploadExcel');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::post('/verify_user', 'AdminController@verify_user');
    Route::post('/delete_user', 'AdminController@delete_user');
});
