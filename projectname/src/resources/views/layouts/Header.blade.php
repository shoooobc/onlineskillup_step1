<!DOCTYPE html>
<html>
<head>
    @yield('head')
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
    <div class="item">
        <form action="{{ url('/') }}" method="POST" class="search">
            {{ csrf_field() }}
            <input type="text" name="search" class="search" placeholder="検索">
        </form>
    </div>
</div>
<?php
}else{
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">投稿</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">プロフィール</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">ログイン</a></div>
    <div class="item">
        <form action="{{ url('/') }}" method="POST" class="search">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="検索">
        </form>
    </div>
</div>
<?php
}
?>

@yield('content')
<br>
</body>
</html>
