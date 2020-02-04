<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function userHistory()
    {
        return $this->hasManyThrough('App\History', 'App\User');
    }
}
