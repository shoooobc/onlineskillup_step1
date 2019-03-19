<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    // Indexページの表示
    public function index()
    {
        return view('Logoutpage');
    }
}