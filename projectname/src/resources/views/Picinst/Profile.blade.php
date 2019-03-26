<!DOCTYPE html>
<html>
<head>
    <title>プロフィール</title>
    <link rel="stylesheet"  href="/css/Picinst/style.css">
</head>
<body>
<?php

if ($Judgment == 0) {
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
    <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
</div>
<?php
}else{
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">ログイン</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">投稿</a></div>
</div>
<?php
}
?>
<br>
<p>{{$github_id}}</p>

@isset($post)
    @foreach($post as $b)
        <img src="data:image/gif;base64,{{ $b->image }}" height="200px" width="150px">
    @endforeach
@endisset
</body>
</html>