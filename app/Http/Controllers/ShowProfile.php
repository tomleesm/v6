<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     *
     * @param  string  $id
     * @param App\User $user
     * @return Response
     */
    public function get($id, Request $request)
    {
        return 'profile: ' . $id;
    }
}
