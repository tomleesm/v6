<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:10',
        ])->validate();
    }
}
