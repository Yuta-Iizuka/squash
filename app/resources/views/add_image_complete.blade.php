@extends('layouts.layout')
@section('content')
<div class="container">
    <h2>画像登録完了</h2>

    <img src="{{ asset($image->path) }}">

</div>
</body>
</html>

@endsection  
