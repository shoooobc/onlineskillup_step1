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

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <!-- アップロードした画像。なければ表示しない -->
    @isset ($filename)
        <div>
            @foreach($filename as $pic)
            <img src="{{ asset('User/Desktop/iPhone6/shoooo/スクリーンショット/' . $pic) }}">
            @endforeach
        </div>

    @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="pic">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>
</body>
</html>