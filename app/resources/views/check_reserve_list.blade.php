
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
                    @if($terms['term_1'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_2']}}</td>
                    @if($terms['term_2'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_3']}}</td>
                    @if($terms['term_3'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_4']}}</td>
                    @if($terms['term_4'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_5']}}</td>
                    @if($terms['term_5'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_6']}}</td>
                    @if($terms['term_6'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_7']}}</td>
                    @if($terms['term_7'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_8']}}</td>
                    @if($terms['term_8'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_9']}}</td>
                    @if($terms['term_9'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_10']}}</td>
                    @if($terms['term_10'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_11']}}</td>
                    @if($terms['term_11'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_12']}}</td>
                    @if($terms['term_12'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_13']}}</td>
                    @if($terms['term_13'] == $info->term)
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    @endif
                </tr>
            </table>
            <a href="{{ url()->previous() }}" >戻る</a>
    </div>
</body>
</html>

@endsection    
