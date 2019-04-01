<!DOCTYPE html>
<html>
<head>
    <title>{{$github_id}}のプロフィール</title>
    <link rel="stylesheet"  href="/css/Picinst/Profile.css">
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
<br>
<br>
<br>
<br>
<div>
    <img src="https://github.com/{{$github_id}}.png" height="15%" width="15%">
    <p>{{$github_id}}</p>
    <p>いいね合計数{{$like}}</p>
</div>

        <di class="outer">
            <div id="grid">
                <ul>
                    @isset($post)
                        @foreach($post as $b)
                    <li><img  src="data:image/gif;base64,{{ $b->image }}" class="photo"></li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </di>
</body>
</html>
