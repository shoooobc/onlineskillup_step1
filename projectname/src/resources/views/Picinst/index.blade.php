@extends('layouts.Header')

@section('head')
    <title>トップページ</title>
    <link rel="stylesheet"  href="/css/Picinst/index.css">
@endsection

@section('content')
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
<div class="PreviousNext">
        @if($post->previousPageUrl()!=null)
            <a href="{{$post->previousPageUrl()}}" class="button">←前</a>
        @endif
        @if($post->nextPageUrl()!=null)
            <a href="{{$post->nextPageUrl()}}" class="button">次→</a>
    @endif
    </div>
    <br>
@endisset
@endsection

