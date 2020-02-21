<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function foo(Request $request)
    {
        return view('foo');
    }

    public function bar(Request $request)
    {
        Cookie::queue(Cookie::make('email', 'tomleesm@gmail.com', 1));
        $cookie = cookie('name', 'Tom', 1);

        return redirect('/user/foo')->cookie($cookie);
    }
}
