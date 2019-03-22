<!DOCTYPE html>
<html>
<head>
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/index.css">
</head>
<body>
<?php
use Illuminate\Support\Facades\Auth;
?>

<?php

if (Auth::check()==true) {
    ?>
    <div class="container">
        <div class="item">ホーム</div>
        <div class="item">ログアウト</div>
        <div class="item"><a href="CreatePost.blade.php">投稿</a></div>
    </div>
    <?php
}else{
    ?>
    <div class="container">
        <div class="item">ホーム</div>
        <div class="item">ログイン</div>
        <div class="item">投稿</div>
    </div>
    <?php
}
?>
<hr>
<!-- エラーメッセージエリア -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ url('bbs') }}" method="POST" enctype="multipart/form-data">
    <label>
    <input type="file" class="form-control" name="pic" placeholder="写真を選択">
    </label>
    <br>
    <textarea name="comment" rows="20" cols="80"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>

</body>
</html>