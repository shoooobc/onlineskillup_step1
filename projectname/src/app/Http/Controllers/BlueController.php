<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blue; // さっき作成したモデルファイルを引用


class BlueController extends Controller
{
    // Indexページの表示
    public function index() {

        $blue = Blue::all(); // 全データの取り出し
        return view('blue.index', ["blue" => $blue]); // bbs.indexにデータを渡す
    }

    // 投稿された内容を表示するページ
    public function create(Request $request) {

        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required|min:5|max:140',
        ]);

        // 投稿内容の受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');

        Blue::insert(["name" => $name, "comment" => $comment]); // データベーステーブルbbsに投稿内容を入れる

        $blue = Blue::all(); // 全データの取り出し
        return view('blue.index', ["blue" => $blue]); // bbs.indexにデータを渡す
    }
}