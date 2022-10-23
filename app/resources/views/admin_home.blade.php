
@extends('layouts.layout_admin')
@section('content')
    <div class="container">
        <h2>管理者専用ページ</h2><br>

        <h3>メインメニュー</h3>
            <div class="container">
                <div class="list-group">
                    <a href="{{ route('admin.gym.list')}}" class="list-group-item list-group-item-action">施設一覧</a>    
                </div>
            </div>
        <br>
        <br>
        <h3>申請があった施設一覧</h3>

        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>施設名</th>
                    <th scope='col'>住所</th>
                    <th scope='col'>電話番号</th>
                </tr>
            </thead>
                @foreach($admin as $info)
                <tr>
                    <td scope='col'>{{ $info['name']}}</td>
                    <td scope='col'>{{ $info['prif']}}{{ $info['city']}}{{ $info['adress']}}</td>
                    <td scope='col'>{{ $info['tel']}}</td>
                    <td scope='col'>
                        <a href="{{ route('admin.gym.order', ['id' => $info['id']]) }}">確認する</a>
                    </td>
                </tr>
                @endforeach
        </table>

        

    </div>
    
</body>
</html>

@endsection   