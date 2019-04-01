<!DOCTYPE html>
<html>
<head>
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/Create.css">
    <link rel="stylesheet" type="text/css" href="/css/Picinst/Header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
    <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
    <div class="item"><a href="{{url('Profile')}}">プロフィール</a></div>
</div>
<div class="outer">
    <div class="CreatePost">
        <!-- エラーメッセージエリア -->
        @if ($errors->any())
            <h2>エラーメッセージ</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="/EditPost?post_id={{$post->post_id}}" method="POST">
            <img src="data:image/gif;base64,{{ $post->image }}" height="250px" width="200px">
            <br>
            <textarea name="comment">{{$post->caption}}</textarea>
            <br>
            {{ csrf_field() }}
            <input type="submit" value="投稿" class="button">
        </form>
    </div>
</div>
</body>
</html>