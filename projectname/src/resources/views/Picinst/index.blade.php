<!DOCTYPE html>
<html>
<head>
    <title>top</title>
{{--    <link rel="stylesheet" type="text/css"  href="{{ asset('/Picinsst/style.css') }}">--}}
    <link rel="stylesheet"  href="/css/Picinst/index.css">
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
@isset($post)
    @foreach($post as $b)
        <div class="pic">
            <div class="pic2">
        <h2><a href="/User_Profile?github_id={{$b->github_id}}">{{ $b->github_id }}</a>さんの投稿</h2>
        {{ $b->caption }}<br>
        <img src="data:image/gif;base64,{{ $b->image }}" height="250px" width="200px">

        @if($github_id==$b->github_id)
        <a href="/delete?post_id={{$b->post_id}}" >削除</a>
        @endif
        <br>
        </div>
        </div>
    @endforeach
@endisset
</body>
</html>