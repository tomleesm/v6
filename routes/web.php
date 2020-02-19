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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/test', 'TestController@index');
Route::get('/test/hello', 'TestController@hello');
//Route::get('/test/method', function ()
//{
 //   return view('test');
//});
Route::get('/user/{id}', 'ShowProfile@get');
//Route::apiResource('photos', 'PhotoController')->except([
//  'index', 'show'
//]);
Route::resource('photos.comments', 'PhotoCommentController')->shallow();

Route::get('photos/create', 'PhotoController@method');
Route::resource('photos', 'PhotoController');
