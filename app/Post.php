<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;

class Post extends Model
{
    use RevisionableTrait;

    protected $keepRevisionOf = ['title', 'body'];
}
