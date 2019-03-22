<!DOCTYPE html>
<html>
<head>
    <title>top</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/index.css">
</head>
<body>
<?php
use Illuminate\Support\Facades\Auth;
?>

<?php

if (!isset($_SESSION["username"])) {
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
</body>
</html>