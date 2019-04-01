<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller{
//    自分のプロフィール
    public function index(Request $request){
        $Judgment=HomeController::Judgment($request);
        if($Judgment==1){
            return redirect('/');
        }
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);
        $github_id=$user->user['login'];
        $post = DB::select('select * from public.post where flag=0 and github_id=? order by post_id desc',[$github_id]);
        $like =DB::table('public.like')
            ->Join('post', function ($join)use($github_id) {
                $join->on('post.post_id','=','public.like.post_id')
                    ->where('post.github_id','=',$github_id);
            })
            ->where('public.like.fav','=',1)
            ->count();

        return view('Picinst/Profile')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
            "like" => $like,
        ]);
    }

//    他の人のプロフィール
    public function user_profile(Request $request){
        $Judgment=HomeController::Judgment($request);
        $github_id = $request->input('github_id');
        $like =DB::table('public.like')
            ->Join('post', function ($join)use($github_id) {
                $join->on('post.post_id','=','public.like.post_id')
                    ->where('post.github_id','=',$github_id);
            })
            ->where('public.like.fav','=',1)
            ->count();
        $post = DB::select('select * from public.post where flag=0 and github_id=? order by post_id desc',[$github_id]);
        return view('Picinst/Profile')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
            "like" => $like,
        ]);
    }

}