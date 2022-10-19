@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="list-group">
        <a href="{{route('event.create')}}" class="list-group-item list-group-item-action">イベント新規登録</a>
        <a href="{{route('event.list')}}" class="list-group-item list-group-item-action">イベント編集</a>
        <a href="#" class="list-group-item list-group-item-action">施設情報編集</a>
        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
    </div>
</div>
</body>
</html>

@endsection   