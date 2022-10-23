
@extends('layouts.layout')
@section('content')
    <div class="container">
        


        <div class="col-sm-4 ">
            <form class="form-inline" action="{{ route('index')}}">
            <div class="form-group">
            <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="検索">
            </div>
            <input type="submit" value="検索" class="btn btn-primary">
            </form>
        </div>



        <h2>予約施設一覧</h2>

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
                    <td scope='col'>{{ $info['name']}}</td>
                    <td scope='col'>{{ $info['access']}}</td>
                    <td scope='col'>{{ $info['start_time']}}~{{ $info['end_time']}}</td>
                    <td scope='col'>
                        <a href="{{ route('gym.show', ['id' => $info['id']]) }}">施設詳細</a>
                    </td>
                    <td scope='col'>
                        <a href="{{ route('user.carender', ['id' => $info['id']]) }}">予約する</a>
                    </td>
                </tr>

                @endforeach
                @if(!empty($keyword))
                <div class="d-flex justify-content-center ">
                    {{ $informations->appends(Request::only('keyword'))->links() }}
                </div>
                @endif
        </table>
            <a href="{{ route('user.mypage') }}">マイページへ</a>
    </div>
    
</body>
</html>

@endsection    