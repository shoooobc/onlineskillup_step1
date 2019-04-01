<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table       = 'like';
    protected $fillable = ['github_id','post_id','fav'];
    protected $casts = [
        'fav' => 'integer',
    ];
}
