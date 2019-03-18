<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    protected $fillable = ['name','comment','pic']; // 追記したところ
}