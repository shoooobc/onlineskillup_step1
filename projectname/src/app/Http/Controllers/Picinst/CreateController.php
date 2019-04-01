<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use App\Model\Post;
use Illuminate\Support\Facades\DB;


class CreateController extends Controller
{
    //    投稿するためのページ
    public function CreatePost(Request $request){
        $Judgment=HomeController::Judgment($request);
        if($Judgment==1){
            return redirect('/');
        }
        $Judgment=HomeController::Judgment($request);
        return view('Picinst/CreatePost',["Judgment" => $Judgment]);
    }

    //    投稿作成
    public function create(Request $request) {
        // バリデーションチェック
        $request->validate([
            'comment' => 'max:200',
            'pic' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                //画像サイズ
                'max:61440',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png,gif',
            ]
        ]);
        $github_id=HomeController::github_user($request);
        $caption = $request->input('comment');
        $path = base64_encode(file_get_contents($request->file('pic')->getRealPath()));
        Post::insert(["github_id"=>$github_id,"caption" => $caption,'image'=>$path]);

        if ($request->file('pic')->isValid([])) {
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    //編集するときの画面遷移
    public function Edit(Request $request){
        $post_id = $request->input('post_id');
        $post=DB::table('post')
            ->where('post_id', $post_id)->first();
        return view('Picinst/Edit')->with('post',$post);
    }
    //編集
    public function EditPost(Request $request){
        $Judgment=HomeController::Judgment($request);
        if($Judgment==1){
            return redirect('/');
        }
        $request->validate(['comment' => 'max:200']);
        $caption = $request->input('comment');
        $post_id = $request->input('post_id');
        DB::update('update public.post set caption=? where post_id=?',[$caption,$post_id]);
        return redirect('/');
    }

    //    投稿削除
    public function delete(Request $request){
        $post_id = $request->input('post_id');
        DB::update('update post set flag=1 where post_id=?',[$post_id]);
        DB::table('like')->where('post_id', '=', $post_id)->delete();
        return redirect('/');
    }
}