<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GithubController extends Controller
{
    public function top(Request $request)
    {
        $token = $request->session()->get('github_token', null);

        try {
            $github_user = Socialite::driver('github')->userFromToken($token);
        } catch (\Exception $e) {
            return redirect('login/github');
        }

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/user/repos', [
            'headers' => [
                'Authorization' => 'token ' . $token
            ]
        ]);

        $app_user = DB::select('select * from public.users where github_id = ?', [$github_user->user['login']]);

        return view('github', [
            'user' => $app_user[0],
            'nickname' => $github_user->nickname,
            'token' => $token,
            'repos' => array_map(function($o) {
                return $o->name;
            }, json_decode($res->getBody()))
        ]);
    }
}