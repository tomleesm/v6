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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/edit-settings', function() {
        if(Gate::allows('edit-settings')) {
            return 'edit settings';
        }
        else if(Gate::denies('/edit-settings')) {
            return Gate::inspect('edit-settings')->message();
        }
    });

    Route::get('/update-post', function() {
        $post = \App\Post::findOrFail(1);
        $user = Auth::user();
        if(Gate::forUser($user)->allows('update-post', $post)) {
            return $user->name . ' can update post: ' . $post->name;
        }
        else if(Gate::denies('update-post', $post)) {
            return 'deny update post';
        }
    });

    Route::get('/change-post', function() {
        $post = \App\Post::findOrFail(1);
        if(Gate::any(['update-post', 'delete-post'], $post)) {
            $user = Auth::user();
            return $user->name . ' can change post: ' . $post->name;
        }
        else if(Gate::authorize('update-post', $post)) {
            # throw AuthorizationException
            # and converted to 403 HTTP response
            return 'should throw exception, so you don\'t see me.';
        }
    });

    Route::get('/extra-flag', function() {
        $post = \App\Post::findOrFail(1);
        $isCreate = false;
        if(Gate::check('create-post', [$post, $isCreate])) {
            $user = Auth::user();
            return $user->name . ' can create post: ' . $post->name;
        }
        else {
            return 'deny create post';
        }
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
