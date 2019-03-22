<!DOCTYPE html>
<html>
<head>
    <title>top</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/index.css">
</head>
<body>

<?php

if ($Judgment == 1) {
    ?>
<div class="container">
    <div class="item">ホーム</div>
    <div class="item">ログアウト</div>
    <div class="item"><a href="/CreatePost">投稿</a></div>
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
{{$Judgment}}
@isset($bbs)
    @foreach($bbs as $b)
        <h2>{{ $b->name }}さんの直前の投稿</h2>
        {{ $b->comment }}<br>
        <img src="data:image/gif;base64,{{ $b->pic }}" height="200px" width="150px">
        <br><hr>
    @endforeach
@endisset
</body>
</html>