@extends('layouts.layout')
@section('content')
    <div class="container">
        <h3>予約一覧</h3>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>施設名</th>
                        <th scope='col'>予約日</th>
                        <th scope='col'>予約時間</th>
                        <th scope='col'>キャンセル</th>
                    </tr>
                </thead>
                    @foreach($reservation as $res)
                    <tr>
                        <th scope='col'>{{ $res['name']}}</th>
                        <th scope='col'>{{ $res['date']}}</th>
                        <th scope='col'>{{ $res['term']}}</th>
                        <th scope='col'>
                            <a href="{{ route('reserve.delete', ['id' => $res['id']]) }}">キャンセル</a>
                        </th>
                </tr>
                @endforeach
        </table>
    </div>
</body>
</html>

@endsection  