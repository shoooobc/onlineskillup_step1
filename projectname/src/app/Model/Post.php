<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table       = 'post';
    protected $primaryKey = 'post_id';
    protected $fillable = ['post_id','github_id','caption','image','flag']; // 追記したところ
    protected $casts = [
        'post_id' => 'integer',
    ];
}
