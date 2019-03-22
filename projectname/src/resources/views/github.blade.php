<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>github</title>
</head>
<body>
<?php
//use Illuminate\Support\Facades\Auth;
//
if (Auth::check()==false) {
    // ユーザーはログインしている
?>
<a href="{{ url('logout') }}">ログアウトする</a>
<form action="/user" method="post">
    {{ csrf_field() }}

    <div>お名前 : <input type="text" name="name" ></div>

    <div>コメント : <input type="text" name="comment" ></div>


    <input type="submit" value="Confirm">
</form>
<div>ようこそ{{ $nickname }}さん</div>
<div>あなたのトークンは{{ $token }}です</div>
<div>リポジトリ一覧</div>
<ul>
    @foreach($repos as $repo)
        <li>{{ $repo }}</li>
    @endforeach
</ul>

<form action="/github/issue" method="post">
    {{ csrf_field() }}

    <div>repo : <input type="text" name="repo"></div>

    <div>title : <input type="text" name="title"></div>

    <div>body : <input type="text" name="body"></div>

    <input type="submit" value="Confirm">
</form>
<?php
}
?>

{{--<p>青木省</p>--}}
{{--ようこそ{{ $nickname }}さん--}}
</body>
</html>