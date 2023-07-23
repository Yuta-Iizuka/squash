@extends('layouts.layout_admin')
@section('content')
    <div class="container">
        <h3>予約一覧</h3>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>施設名</th>
                        <th scope='col'>予約日</th>
                        <th scope='col'>予約時間</th>
                        <th scope='col'></th>
                        <th scope='col'></th>
                    </tr>
                </thead>
                    @foreach($reservation as $res)
                    <tr>
                        <th scope='col'>{{ $info->name }}</th>
                        <th scope='col'>{{ $res['date']}}</th>
                        <th scope='col'>{{ $res['term']}}</th>
                        <th scope='col'>
                            <a href="{{ route('gym.reserve.delete', ['id' => $res['id']]) }}">キャンセル</a>
                        </th>
                        <th scope='col'>
                            <a href="{{ route('gym.reserve.edit', ['id' => $res['id']]) }}">予約内容変更</a>
                        </th>
                </tr>
                @endforeach
        </table>
    </div>
</body>
</html>

@endsection  