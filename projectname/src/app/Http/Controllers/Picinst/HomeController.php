<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('Picinst/index');
    }
    public function CreatePost()
    {
        return view('Picinst/CreatePost');
    }

}