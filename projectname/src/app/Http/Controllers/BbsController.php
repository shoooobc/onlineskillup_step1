<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Model\Bbs;

class BbsController extends Controller
{
    // Indexページの表示
    public function index() {
        $bbs = Bbs::all();

        return view('bbs.index',["bbs" => $bbs]);
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {

        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:10',
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
        $nme = $request->input('name');
        $comment = $request->input('comment');

        $path = base64_encode(file_get_contents($request->file('pic')->getRealPath()));

//        $path = $request->file('pic')->store('public');

        Bbs::insert(["name" => $nme,"comment" => $comment,'pic'=>$path]);

        $bbs = Bbs::all(); // 全データの取り出し

      if ($request->file('pic')->isValid([])) {
            return view('bbs.index')->with('bbs', $bbs);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}