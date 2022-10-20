@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="list-group">
        
        <a href="{{route('event.create')}}" class="list-group-item list-group-item-action">イベント新規登録</a>
        <a href="{{route('event.list')}}" class="list-group-item list-group-item-action">イベント編集</a>
        <a href="{{ route('gym.carender', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action">予約</a>
        <a href="{{ route('gym.mypage') }}" class="list-group-item list-group-item-action">施設側が予約した情報一覧（編集・削除）</a>
        <a href="{{ route('check.carender', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action">施設全ての予約一覧</a>
        <a href="#" class="list-group-item list-group-item-action">施設情報編集</a>        
    </div>
</div>
</body>
</html>

@endsection   