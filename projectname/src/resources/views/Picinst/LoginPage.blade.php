<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/Picinst/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ログインページ</title>
</head>
<body>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">ログイン</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">投稿</a></div>
    <div class="item"><a href="{{url( 'loginpage' )}}">プロフィール</a></div>
</div>
<br>
<a href="{{url( 'login/github' )}}" class="btn-flat-dashed-filled">github login</a>

</body>
</html>