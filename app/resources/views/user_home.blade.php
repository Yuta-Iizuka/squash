
@extends('layouts.layout')
@section('content')
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>施設名</th>
                <th scope='col'>アクセス</th>
                <th scope='col'>営業時間</th>
            </tr>
        </thead>
            @foreach($informations as $info)
            <tr>
                <th scope='col'>{{ $info['name']}}</th>
                <th scope='col'>{{ $info['access']}}</th>
                <th scope='col'>{{ $info['start_time']}}~{{ $info['end_time']}}</th>
                <th scope='col'>
                    <a href="{{ route('gym.show', ['id' => $info['id']]) }}">施設詳細</a>
                </th>
                <th scope='col'>
                    <a href="{{ route('gym.reserve', ['id' => $info['id']]) }}">予約する</a>
                </th>
            </tr>
            @endforeach

    </table>
</body>
</html>

@endsection    