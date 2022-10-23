@extends('layouts.layout')
@section('content')
<div class="container">
    <h2>画像登録</h2>

    <form method="POST" action="{{ route('upload.image',['id' => $informations['id']]) }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit" class="btn btn-primary" >アップロード</button>
    </form>

</div>
</body>
</html>

@endsection  

