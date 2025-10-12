<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bura1\Commentions\Contracts\Commentable;
use Bura1\Commentions\HasComments;
use Tests\Database\Factories\PostFactory;

class Post extends Model implements Commentable
{
    use HasComments;
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): PostFactory
    {
        return new PostFactory();
    }
}
