<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;

class PostController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  App\Http\Requests\StoreBlogPost $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {
        $validated = $request->validated();
        return print_r($validated, true);
    }
}
