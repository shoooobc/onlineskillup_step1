<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Model\Post;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index(Request $request)
    {
        $Judgment=$this->Judgment($request);
        $post = DB::select('select * from public.posts where flag=0');
        if($Judgment==0){
            $github_id=$this->github_user($request);
            return view('Picinst/index')->with([
                "Judgment" => $Judgment,
                "github_id" =>$github_id,
                "post" => $post,
            ]);
        }
        $github_id="guest";
        return view('Picinst/index')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
        ]);

    }

    public function github_user(Request $request){
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);
        $github_id=$user->user['login'];

        return $github_id;
    }

    public function delete(Request $request){
        $github_id=$this->github_user($request);
        $post_id = $request->input('post_id');
        DB::select('update posts set flag=1 where post_id=?',[$post_id]);
        $post = DB::select('select * from public.posts where flag=0');
        $Judgment=$this->Judgment($request);
        return redirect('/')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
        ]);
    }

    public function Login(Request $request){
        $Judgment=$this->Judgment($request);
        if($Judgment==0){
            return redirect('/');
        }
        return view('Picinst/LoginPage');
    }


    public function Judgment(Request $request)
    {
        if ($request->session()->get('github_token')!=null) {
            $Judgment = 0;
            return  $Judgment;
        }
        $Judgment = 1;
        return $Judgment;
    }

    public function CreatePost(Request $request)
    {
        $Judgment=$this->Judgment($request);
        if($Judgment==1){
            return redirect('/');
        }
        $Judgment=$this->Judgment($request);
        return view('Picinst/CreatePost',["Judgment" => $Judgment]);
    }

    public function create(Request $request) {
        $Judgment=$this->Judgment($request);
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

        $github_id=$this->github_user($request);

        $caption = $request->input('comment');

        $path = base64_encode(file_get_contents($request->file('pic')->getRealPath()));

        Post::insert(["github_id"=>$github_id,"caption" => $caption,'image'=>$path]);

        $post = DB::select('select * from public.posts where flag=0');

        if ($request->file('pic')->isValid([])) {
            return view('Picinst/index')->with([
                "Judgment" => $Judgment,
                "github_id" =>$github_id,
                "post" => $post,
            ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

}