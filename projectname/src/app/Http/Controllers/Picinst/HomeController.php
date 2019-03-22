<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use App\User;
use App\Model\Bbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $Judgment = 1;
            return view('Picinst/index',["Judgment" => $Judgment]);
        }else{
            $Judgment = 0;
            return view('Picinst/index',["Judgment" => $Judgment]);
        }
    }

    public function CreatePost()
    {
        return view('Picinst/CreatePost');
    }
    public function create(Request $request) {

        // バリデーションチェック
        $request->validate([
            'comment' => 'required|min:5|max:140',
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

        // 投稿内容の受け取って変数に入れる
        $nme = "aoki";
        $comment = $request->input('comment');

        $path = base64_encode(file_get_contents($request->file('pic')->getRealPath()));

//        $path = $request->file('pic')->store('public');

        Bbs::insert(["name" => $nme,"comment" => $comment,'pic'=>$path]);

        $bbs = Bbs::all(); // 全データの取り出し

        if ($request->file('pic')->isValid([])) {
            return view('Picinst.index')->with('bbs', $bbs);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

}