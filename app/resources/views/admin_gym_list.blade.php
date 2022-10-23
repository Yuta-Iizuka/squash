
@extends('layouts.layout_admin')
@section('content')
    <div class="container">
        <h2>施設一覧</h2>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>施設名</th>
                    <th scope='col'>電話番号</th>
                    <th scope='col'>住所</th>
                </tr>
            </thead>
                @foreach($admin as $info)
                <tr>
                    <td scope='col'>{{ $info['name']}}</td>
                    <td scope='col'>{{ $info['tel']}}</td>
                    <td scope='col'>{{ $info['prif']}}{{ $info['city']}}{{ $info['adress']}}</td>
                    <td scope='col'>
                        <a href="{{ route('admin.gym.detail', ['id' => $info['id']]) }}">施設詳細</a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    
</body>
</html>

@endsection    