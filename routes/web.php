<?php
use Illuminate\Support\Str;

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
Route::get('/uuid/v1', function () {
    return (string) Str::orderedUuid();
});
Route::get('/uuid/v4', function () {
    return (string) Str::uuid();
});
