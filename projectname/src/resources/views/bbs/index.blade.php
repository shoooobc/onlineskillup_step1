<!DOCTYPE HTML>
<html>
<head>
    <title>掲示板</title>
</head>
<body>

<h1>掲示板</h1>
<a href="/login/github">ログインする</a>

<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- 直前投稿エリア -->
@isset($bbs)
    @foreach($bbs as $b)
    <h2>{{ $b->name }}さんの直前の投稿</h2>
    {{ $b->comment }}<br>
    <img src="data:image/gif;base64,{{ $b->pic }}" height="200px" width="150px">
    <br><hr>
    @endforeach
@endisset

<!-- フォームエリア -->
<h2>フォーム</h2>
<form action="{{ url('bbs') }}" method="POST" enctype="multipart/form-data">
    名前:<br>
    <input name="name">
    <br>
    コメント:<br>
    <textarea name="comment" rows="4" cols="40"></textarea><br>

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="pic">
    <br>
    <hr>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>