<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'title' => 1,
            'content' => 1,
        ]
    ];
}
