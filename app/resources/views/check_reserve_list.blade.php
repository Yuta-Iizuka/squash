
@extends('layouts.layout')
@section('content')
    <div class="container">
        <h2> 予約施設：{{ $info->name }} </h2>
        <h3> 予約日時： {{ $date }} </h3> 
            <table class='table'>
                <tr>
                    <th scope='col'>時間</th>
                    <th scope='col'>予約状況</th>
                    <th scope='col'></th>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_1']}}</td>
                    @if($info->term_1 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_2']}}</td>
                    @if($info->term_2 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_3']}}</td>
                    @if($info->term_3 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_4']}}</td>
                    @if($info->term_4 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_5']}}</td>
                    @if($info->term_5 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_6']}}</td>
                    @if($info->term_6 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_7']}}</td>
                    @if($info->term_7 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_8']}}</td>
                    @if($info->term_8 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_9']}}</td>
                    @if($info->term_9 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_10']}}</td>
                    @if($info->term_10 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_11']}}</td>
                    @if($info->term_11 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_12']}}</td>
                    @if($info->term_12 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_13']}}</td>
                    @if($info->term_13 == 0)
                    <td scope='col'>〇</td>
                    @else
                    <td scope='col'>×</td>
                    @endif
                </tr>
            </table>
            <a href="{{ url()->previous() }}" >戻る</a>
    </div>
</body>
</html>

@endsection    
