<?php
use Illuminate\Http\Response;
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

Route::get('/responses/array', function () { return [1, 2, 3]; });
Route::get('/responses/hello-world', function () { return response('Hello World', 200)->header('Content-Type', 'text/plain'); });
Route::get('/responses/header3', function () {
    return response('header 3')
            ->header('Content-Type', 'text/plain')
            ->header('X-Header-One', 'One')
            ->header('X-Header-Two', 'Two');
});
Route::middleware('cache.headers:public;max_age=2628000')->group(function() {
    Route::get('/responses/with-headers', function () {
        return response('header 3')->withHeaders(
            [
                'Content-Type' => 'text/plain',
                'X-Header-One' => 'One',
                'X-Header-Two' => 'Two'
            ]);
    });
});
Route::get('user/profile/{id?}', function () { return view('profile'); })->name('profile');
Route::post('user/profile', function () { return back()->withInput(); });
Route::get('redirect/route', function () { return redirect()->route('profile'); });
Route::get('redirect/route/{id}', function ($id) { return redirect()->route('profile', ['id' => $id]); });
Route::get('redirect/route/user/{user}', function (App\User $user) {
    return redirect()->route('profile', [$user]);
});
Route::get('responses/away', function () { return redirect('https://www.google.com.tw'); });
// 請注意，以下是 redirect()->with()，變數 status 要存到 session 才能帶過去
// 和 view()->with() 是不一樣的
Route::get('responses/flash', function () { return redirect('dashboard')->with('status', 'DONE'); });
Route::get('dashboard', function () { return view('dashboard'); });
Route::get('responses/json', function () { return response()->json(['name' => 'Abigail', 'state' => 'CA']); });
Route::get('responses/jsonp', function () {
    return response()
           ->json(['name' => 'Abigail', 'state' => 'CA'])
           ->withCallback('tomcallback');
});
Route::get('responses/jsonp/custom', function () {
    return response()
           ->json(['name' => 'Abigail', 'state' => 'CA'])
           ->withCallback(request()->input('callback'));
});
Route::get('responses/download', function () { return response()->download('photo.jpg', '峠.jpg'); });
Route::get('responses/download/path', function () { return response()->download('/tmp/photo.jpg'); });
Route::get('responses/download/file', function () { return response()->file('photo.jpg'); });
Route::get('responses/macro', function () { return response()->caps('abcdefg'); });
