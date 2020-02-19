<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only('hello');
    }
    public function index() {
        return 'test';
    }
    public function hello() {
        return 'hello';
    }
}
