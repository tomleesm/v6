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
    return view('welcome.bfrbb');
});
Route::get('/error/tom-exception', function () {
    throw new \App\Exceptions\TomException;
});
Route::get('/error/abort/{code?}/{message?}', function ($code = 404, $message = 'Not Found')
{
    abort($code, $message);
});
