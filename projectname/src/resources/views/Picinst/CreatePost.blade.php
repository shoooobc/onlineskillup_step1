<!DOCTYPE html>
<html>
<head>
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/style.css">
</head>
<body>
<?php

if ($Judgment == 0) {
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
    <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
    <div class="item"><a href="{{url('Profile')}}">プロフィール</a></div>
</div>
<?php
}else{
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">ログイン</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">投稿</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">プロフィール</a></div>
</div>
<?php
}
?>
<br>
<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
    <label>
    <input type="file" class="form-control" name="pic" placeholder="写真を選択">
    </label>
    <br>
    <textarea name="comment" rows="20" cols="80"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>