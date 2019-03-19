<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<p>{{ $pic }}</p>

<img src="data:image/gif;base64,{{ $pic }}">

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data" class="post_form">
    <div class="form_parts">
        <input type="file" name="pic">
        <br>
        {{ csrf_field() }}
        <button class="btn btn-success">投稿</button>
    </div>
</form>
</body>
</html>