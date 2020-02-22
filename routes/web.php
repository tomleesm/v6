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
Route::get('/view/exists', function () { return View::exists('test') ? 'exist': 'not exist'; });
Route::get('/view/first', function () { return View::first(['custom.admin', 'admin']); });
Route::get('/view/pass', function () { return view('greeting', ['name' => 'Tom']); });
