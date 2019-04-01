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
                <a href="/User_Profile?github_id={{$b->github_id}}" class="user">{{ $b->github_id }}</a>
                @if($github_id==$b->github_id)
                   <div class="operation">
                       <a href="/Edit?post_id={{$b->post_id}}" class="Edit">編集</a><br>
                       <a href="/delete?post_id={{$b->post_id}}" class="delete">削除</a>
                   </div>
                @endif
                <br>
                <img src="data:image/gif;base64,{{ $b->image }}">

                <p class="caption">{{ $b->caption }}</p>

                <a href="/GoodList?post_id={{$b->post_id}}" class="GoodList">いいねしたユーザ</a>
                <?php
                    if($Judgment==0){
                        if($b->fav==0){
                        ?>
                        <a href="/good?post_id={{$b->post_id}}" class="good">&#9825;</a>
                        <?php
                        }else{
                        ?>
                        <a href="/good?post_id={{$b->post_id}}" class="good" style="color:red">&hearts;</a>
                    <?php
                    }}else{
                    ?>
                   <a class="good">&#9825;</a>
                    <?php
                    }
                    ?>
<br>
<br>
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
