<!DOCTYPE html>
<html>
<head>
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/Create.css">
    <link rel="stylesheet" type="text/css" href="/css/Picinst/Header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script type="text/javascript" language="javascript">
        function OnFileSelect( inputElement )
        {
            var fileList = inputElement.files;
            var fileCount = fileList.length;
            var loadCompleteCount = 0;  var imageList = "";
            for ( var i = 0; i < fileCount; i++ ) {
                var fileReader = new FileReader();
                var file = fileList[ i ];
                fileReader.onload = function() {
                    imageList += "<li><img src=\"" + this.result + "\" height='400px' width='400px' /></li>\r\n";
                    if ( ++loadCompleteCount == fileCount ) {
                        document.getElementById( "ID001" ).innerHTML = imageList;
                    }
                };
                fileReader.readAsDataURL( file );
            }
        }
</script>



<?php

if ($Judgment == 0) {
?>
<div class="container">
    <div class="item"><a href="/">ホーム</a></div>
    <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
    <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
    <div class="item"><a href="{{url('Profile')}}">プロフィール</a></div>
</div>
<?php
}
?>
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
        <form action="{{ url('/create') }}" method="POST" enctype="multipart/form-data">
            <label for="sample">
                写真を選択
            <input type="file" onchange="OnFileSelect( this );" multiple class="form-control" name="pic" id="sample" placeholder="写真を選択">
            </label>
            <ul id="ID001" ></ul>
            <br>
            <textarea name="comment"></textarea>
            <br>
            {{ csrf_field() }}
            <input type="submit" value="投稿" class="button">
        </form>
    </div>
</div>
</body>
</html>