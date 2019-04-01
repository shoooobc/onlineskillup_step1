<!DOCTYPE html>
<html>
<head>
    <title>top</title>
    <link rel="stylesheet"  href="/css/Picinst/index.css">
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
            <input type="text" name="search"  placeholder="キャプション検索">
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
            <input type="text" name="search" placeholder="キャプション検索">
        </form>
    </div>
</div>
<?php
}
?>
<br>
@isset($post)
    @foreach($post as $b)
        <div class="outer">
            <div class="inner">
                <a href="/User_Profile?github_id={{$b->github_id}}">{{ $b->github_id }}</a>
                @if($github_id==$b->github_id)
                    <a href="/Edit?post_id={{$b->post_id}}" >編集</a>
                    <a href="/delete?post_id={{$b->post_id}}" >削除</a>
                @endif
                <br>
                <img src="data:image/gif;base64,{{ $b->image }}" height="80%" width="80%">

                <br>{{ $b->caption }}<br>
                <a href="/GoodList?post_id={{$b->post_id}}">いいねしたユーザ</a>
                <?php
                if($Judgment==0){
                    if($b->fav==0){
                    ?>
                    <a href="/good?post_id={{$b->post_id}}">&#9825;</a>
                    <?php
                    }else{
                    ?>
                    <a href="/good?post_id={{$b->post_id}}" style="color:red">&hearts;</a>
                <?php
                }}else{
                ?>
                &#9825;
                <?php
                }
                ?>

            </div>
        </div>
    @endforeach
@endisset


<div class="outer">
    @if($post->previousPageUrl()!=null)
    <a href="{{$post->previousPageUrl()}}" class="button">←前</a>
    @endif
    @if($post->nextPageUrl()!=null)
    <a href="{{$post->nextPageUrl()}}" class="button">次→</a>
    @endif
</div>
<br>
</body>
</html>
