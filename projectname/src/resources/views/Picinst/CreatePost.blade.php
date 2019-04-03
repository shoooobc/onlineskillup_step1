@extends('layouts.Header')
@section('head')
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="/css/Picinst/Create.css">
@endsection

@section('content')
    <script type="text/javascript" language="javascript">
        function OnFileSelect( inputElement )
        {
            var fileList = inputElement.files;
            var imageList = "";
            var fileReader = new FileReader();
            var file = fileList[ 0 ];
            fileReader.onload = function() {
                imageList += "<li><img src=\"" + this.result + "\" height='400px' width='400px' /></li>\r\n";
                document.getElementById( "img" ).innerHTML = imageList;
            };
            fileReader.readAsDataURL( file );
        }
    </script>
    <div class="container">
        <div class="item"><a href="/">ホーム</a></div>
        <div class="item"><a href="{{url('CreatePost')}}">投稿</a></div>
        <div class="item"><a href="{{url('Profile')}}">プロフィール</a></div>
        <div class="item"><a href="{{url( 'logout' )}}">ログアウト</a></div>
        <div class="item">
            <form action="{{ url('/') }}" method="POST" class="search">
                {{ csrf_field() }}
                <input type="text" name="search" class="search" placeholder="検索">
            </form>
        </div>
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
            <form action="{{ url('/create') }}" method="POST" enctype="multipart/form-data">
                <label for="sample">
                    写真を選択
                    <input type="file" onchange="OnFileSelect( this );" multiple class="form-control" name="pic" id="sample" placeholder="写真を選択">
                </label>
                <ul id="img" ></ul>
                <br>
                <textarea name="comment" placeholder="200文字以内"></textarea>
                <br>
                {{ csrf_field() }}
                <input type="submit" value="投稿" class="button">
            </form>
        </div>
    </div>
    <br>
@endsection