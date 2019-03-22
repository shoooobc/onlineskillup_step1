<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;

class LogoutController extends Controller
{
    // Indexページの表示
    public function index()
    {
        return view('Logoutpage');
    }
    public function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $this->middleware('guest')->except('logout');
    }

}