@extends('layouts.Header')
@section('head')
    <title>{{$github_id}}のプロフィール</title>
    <link rel="stylesheet"  href="/css/Picinst/Profile.css">

@endsection
@section('content')
        <div class="outer">
            <div class="inner">
                <div class="account">
                    <img src="https://github.com/{{$github_id}}.png" height="15%" width="15%">
                    <p>{{$github_id}}</p>
                    <p>いいね合計数{{$like}}</p>
                </div>
                    @isset($post)
                        @foreach($post as $p)
                    <img  src="data:image/gif;base64,{{ $p->image }}" class="photo" height="250px" width="250px">
                        @endforeach
                    @endisset
            </div>
        </div>
@endsection