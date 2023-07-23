@extends('layouts.layout_admin')
@section('content')
<div class="container">
    <h3>メインメニュー</h3>
    <div class="list-group">
        <a href="{{ route('check.carender', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action list-group-item-success">予約状況一覧</a>
        <a href="{{ route('gym.carender', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action  ">予約（レッスン登録）</a>
        <a href="{{ route('gym.reserve.list') }}" class="list-group-item list-group-item-action list-group-item-success">予約（レッスン）状況一覧</a>
        <a href="{{route('event.create')}}" class="list-group-item list-group-item-action">イベント新規登録</a>
        <a href="{{route('event.list')}}" class="list-group-item list-group-item-action list-group-item-success">イベント編集</a>
        <a href="{{route('open.time',['id' => $informations->id ])}}" class="list-group-item list-group-item-action">営業時間再登録</a>
        <a href="{{ route('info.edit', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action list-group-item-success">施設情報編集</a>
        <a href="{{ route('add.image', ['id' => $informations->id ]) }}" class="list-group-item list-group-item-action">施設画像追加</a>
    </div>
</div>
</body>
</html>

@endsection
