<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function upload(Request $request)
    {
        $this->validate($request, [
            'pic' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        $pic = base64_encode(file_get_contents($request->file('pic')->getRealPath()));


            return view('home')->with('pic',$pic);
    }
}