<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['github_id','caption','image','flag','fav']; // 追記したところ
}
