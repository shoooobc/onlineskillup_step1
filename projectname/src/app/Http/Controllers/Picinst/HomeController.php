<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use App\Model\Like;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
//    トップページに必要なコード
    public function home(Request $request){
        $Judgment=$this->Judgment($request);
        if($Judgment==0){
            $github_id=$this->github_user($request);
            $post = DB::table('post')
                ->select('post.*','public.like.fav')
                ->leftJoin('public.like', function ($join)use( $github_id) {
                    $join->on('post.post_id', '=', 'public.like.post_id')
                        ->where('like.github_id', '=', $github_id);
                })
                ->where('flag', '=', 0)
                ->orderBy('post_id', 'desc')
                ->paginate(10);
            return array($Judgment, $github_id, $post);
        }
        $github_id="guest";
        $post = DB::table('post')
            ->where('flag', '=', 0)
            ->orderBy('post_id', 'desc')
            ->paginate(10);
        return array($Judgment, $github_id, $post);
    }


//    トップページ
    public function index(Request $request){
        list($Judgment,$github_id,$post) = $this->home($request);
            return view('Picinst/index')->with([
                "Judgment" => $Judgment,
                "github_id" =>$github_id,
                "post" => $post,
            ]);
    }

    //    ログインするためのページ
    public function Login(Request $request){
        $Judgment=$this->Judgment($request);
        if($Judgment==0){
            return redirect('/');
        }
        return view('Picinst/LoginPage');
    }



//    検索
    public function search(Request $request){
        $SearchWord = $request->input('search');
        list($Judgment,$github_id) = $this->home($request);
        $post=DB::table('post')
            ->select('post.*','public.like.fav')
            ->leftJoin('public.like', function ($join)use( $github_id) {
                $join->on('post.post_id', '=', 'public.like.post_id')
                    ->where('like.github_id', '=', $github_id);
            })
            ->where('flag', '=', 0)
            ->where('caption', 'like', "%{$SearchWord}%")
            ->orderBy('post_id', 'desc')
            ->paginate(10);
        return view('Picinst/index')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
        ]);
    }


    //　いいね判定
    public function good(Request $request){
        $Judgment=$this->Judgment($request);

        if($Judgment==0){
            $post_id = $request->input('post_id');
            $github_id=$this->github_user($request);
            $like =DB::select('select * from public.like where post_id=? and github_id=?',[$post_id,$github_id]);
            $fav=DB::table('like')->select('fav')->where('post_id', $post_id)->where('github_id', $github_id)->get();
            if($like==null) {
                Like::insert(["github_id" => $github_id, "post_id" => $post_id, "fav" => 1]);
            }
              else{
                if($fav=='[{"fav":0}]'){
                    DB::update('update public.like set fav=1 where post_id=? and github_id=?',[$post_id,$github_id]);
                }else{
                    DB::update('update public.like set fav=0 where post_id=? and github_id=?',[$post_id,$github_id]);
                }
            }
        }
        return redirect('/');
    }

    //いいねリスト
    public function GoodList(Request $request){
        $Judgment=$this->Judgment($request);
        $post_id = $request->input('post_id');
        $like =DB::select('select * from public.like where post_id=? and fav=1',[$post_id]);
        return view('Picinst/GoodList')->with([
            "Judgment" => $Judgment,
            "like" => $like,
        ]);
    }


//いろいろなコントローラーで使用
//    GitHubのユーザーの取得
    public static function github_user(Request $request){
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);
        $github_id=$user->user['login'];

        return $github_id;
    }
    //　　ユーザー判定
    public static function Judgment(Request $request){
        if ($request->session()->get('github_token')!=null) {
            $Judgment = 0;
            return  $Judgment;
        }
        $Judgment = 1;
        return $Judgment;
    }

}