<?php

namespace App\Http\Controllers\Picinst;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller{
    public function index(Request $request){
        $Judgment=$this->Judgment($request);
        if($Judgment==1){
            return redirect('/');
        }
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);
        $github_id=$user->user['login'];
        $post = DB::select('select * from public.posts where flag=0 and github_id=?',[$github_id]);

        return view('Picinst/Profile')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
        ]);
    }
    public function user_profile(Request $request){
        $Judgment=$this->Judgment($request);
        $github_id = $request->input('github_id');
        $post = DB::select('select * from public.posts where flag=0 and github_id=?',[$github_id]);
        return view('Picinst/Profile')->with([
            "Judgment" => $Judgment,
            "github_id" =>$github_id,
            "post" => $post,
        ]);
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
}