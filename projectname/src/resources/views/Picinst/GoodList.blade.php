@extends('layouts.Header')
@section('head')
    <title>いいね一覧</title>
    <link rel="stylesheet"  href="/css/Picinst/GoodList.css">
@endsection

@section('content')
@isset($like)
    <div class="List">
    @foreach($like as $likes)
            <p>
            <a href="/User_Profile?github_id={{$likes->github_id}}">
                <img src="https://github.com/{{$likes->github_id}}.png" height="15%" width="15%">
                {{$likes->github_id}}</a>
            </p>
    @endforeach
    </div>
@endisset
<br>
@endsection