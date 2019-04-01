<!DOCTYPE html>
<html>
<head>
    <title>top</title>
    <link rel="stylesheet"  href="/css/Picinst/.css">
    <link rel="stylesheet"  href="/css/Picinst/Header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

if ($Judgment == 0) {
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
    <div class="item"><a href="{{url('Profile')}}">プロフィール</a></div>
    <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
</div>
<?php
}else{
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">投稿</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">ログイン</a></div>
</div>
<?php
}
?>
<br>
@isset($like)
    <ul>
    @foreach($like as $likes)
       <img src="https://github.com/{{$likes->github_id}}.png" height="15%" width="15%">
       <li><a href="/User_Profile?github_id={{$likes->github_id}}">{{$likes->github_id}}</a></li>
    @endforeach
    </ul>
@endisset

<br>
</body>
</html>
