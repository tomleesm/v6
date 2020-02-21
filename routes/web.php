<?php
use Illuminate\Http\Request;
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
Route::get('user/foo', 'UserController@foo');
Route::post('user/bar', 'UserController@bar');

Route::get('/request/path/{id?}', function (Request $request) { return $request->path(); });
Route::get('/request/is/{id?}', function (Request $request) { return $request->is('request/is/*') ? 'yes' : 'no'; });
Route::get('/request/url/{id?}', function (Request $request) { return $request->url(); });
Route::get('/request/fullurl/{id?}', function (Request $request) { return $request->fullUrl(); });
Route::get('/request/method/{id?}', function (Request $request) { return $request->method(); });
Route::get('/request/ismethod/{id?}', function (Request $request) { return $request->isMethod('GET') ? 'it is GET' : 'it is not GET'; });
Route::get('/request/all/{id?}', function (Request $request) { return $request->all(); });
Route::get('/request/default/{id?}', function (Request $request) { return $request->input('name', 'Tom'); });
Route::get('/request/query/{id?}', function (Request $request) { return $request->query('name', 'Tom'); });
Route::get('/request/query-all/', function (Request $request) { return $request->query(); });
Route::get('/request/has/{id?}', function (Request $request) { return $request->has('name') ? 'has name' : 'does not has name'; });
Route::get('/request/filled/{id?}', function (Request $request) { return $request->filled('name') ? 'fill name' : 'name is not filled'; });
Route::get('/request/missing/{id?}', function (Request $request) { return $request->missing('name') ? 'missing name' : 'has name'; });
Route::get('/response/cookie/', function (Request $request) { return response('response/cookie')->cookie('name', 'Tom', 1); });
Route::get('/response/cookie/get', function (Request $request) { return $request->cookie(); });

Route::get('/request/file', function (Request $request) {
    return view('file');
});
Route::post('/request/file', function (Request $request) {
    $file = $request->file('photo');

    $path = '/home/tom/apps/v6/public';
    $result = $file->store($path);

    return view('file')->with(['file' => $file, 'result' => $result]);
});
