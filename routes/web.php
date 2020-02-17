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

Route::get('/api/users/{user}', function (App\User $user)
{
    return sprintf('email: %s', $user->email);
})->middleware('throttle:rate_limit,1');
Route::get('/profiles/{m}', function (App\User $user)
{
    return sprintf('name: %s', $user->name);
});
Route::get('/class/{m}', function (App\User $user)
{
    return sprintf('class: %s', get_class($user));
});

Route::fallback(function () {
    return '<h1>404</h1>';
});
Route::middleware('throttle:3|ratelimit,1', 'auth')->group(function () {
    Route::get('/user', function () {
        return 'test rate_limit';
    });
});

Route::middleware('auth')->group(function () {
    Route::middleware('throttle:3,1,default')->group(function () {
        Route::get('/servers', function () {
            return view('servers');
        });
    });

    Route::middleware('throttle:1,1,brbb')->group(function () {
        Route::delete('/servers/{id}', function ($id) {
            return 'delete servers id: ' . $id;
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
