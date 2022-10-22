
@extends('layouts.layout')
@section('content')
    <div class="container">

        <h3> 予約日時： {{ $date }} </h3> 
            <table class='table'>
                <tr>
                    <th scope='col'>時間</th>
                    <th scope='col'>予約状況</th>
                    <th scope='col'></th>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_1']}}</td>
                    @if(in_array($terms['term_1'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_2']}}</td>
                    @if(in_array($terms['term_2'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_3']}}</td>
                    @if(in_array($terms['term_3'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_4']}}</td>
                    @if(in_array($terms['term_4'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_5']}}</td>
                    @if(in_array($terms['term_5'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_6']}}</td>
                    @if(in_array($terms['term_6'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_7']}}</td>
                    @if(in_array($terms['term_7'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_8']}}</td>
                    @if(in_array($terms['term_8'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_9']}}</td>
                    @if(in_array($terms['term_9'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_10']}}</td>
                    @if(in_array($terms['term_10'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_11']}}</td>
                    @if(in_array($terms['term_11'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_12']}}</td>
                    @if(in_array($terms['term_12'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_13']}}</td>
                    @if(in_array($terms['term_13'], $info))
                    <td scope='col'>予約済</td>
                    @else
                    <td scope='col'>空き</td>
                    @endif
                </tr>
            </table>
            <a href="{{ url()->previous() }}" >戻る</a>
    </div>
</body>
</html>

@endsection    
