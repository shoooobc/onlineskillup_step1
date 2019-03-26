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
        $request->session()->forget('key');
        $request->session()->flush();
        // セッション用Cookieの破棄
        setcookie(session_name(), '', time() - 1800);
        $this->middleware('guest')->except('logout');
    }

}