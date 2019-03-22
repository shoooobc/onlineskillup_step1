<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<?php
use Illuminate\Support\Facades\Auth;
?>
<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<?php

if (Auth::check()==true) {
?>

<?php
}
?>

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data" class="post_form">
    <div class="form_parts">
        <input type="file" name="pic">
        <br>
        {{ csrf_field() }}
        <button class="btn btn-success">投稿</button>
    </div>
</form>

<a href="bbs">掲示板</a>

</body>
</html>