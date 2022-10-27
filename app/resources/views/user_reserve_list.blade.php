
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
                    @if((in_array($terms['term_1'], $info)) || ($term_info->term_1 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_1','date' => $date])}}">予約</a>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_2']}}</td>
                    @if((in_array($terms['term_2'], $info)) || ($term_info->term_2 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_2', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_3']}}</td>
                    @if((in_array($terms['term_3'], $info)) || ($term_info->term_3 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_3', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_4']}}</td>
                    @if((in_array($terms['term_4'], $info)) || ($term_info->term_4 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_4', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_5']}}</td>
                    @if((in_array($terms['term_5'], $info)) || ($term_info->term_5 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_5', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_6']}}</td>
                    @if((in_array($terms['term_6'], $info)) || ($term_info->term_6 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_6', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_7']}}</td>
                    @if((in_array($terms['term_7'], $info)) || ($term_info->term_7 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_7', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_8']}}</td>
                    @if((in_array($terms['term_8'], $info)) || ($term_info->term_8 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_8', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_9']}}</td>
                    @if((in_array($terms['term_9'], $info)) || ($term_info->term_9 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_9', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_10']}}</td>
                    @if((in_array($terms['term_10'], $info)) || ($term_info->term_10 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_10', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_11']}}</td>
                    @if((in_array($terms['term_11'], $info)) || ($term_info->term_11 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_11', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_12']}}</td>
                    @if((in_array($terms['term_12'], $info)) || ($term_info->term_12 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_12', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_13']}}</td>
                    @if((in_array($terms['term_13'], $info)) || ($term_info->term_13 == 1))
                    <td scope='col'>×</td>
                    @else
                    <td scope='col'>〇</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'id'=> $id, 'term'=> 'term_13', 'date' => $date])}}">予約</a>
                    </td>    
                    @endif
                </tr>
            </table>
            <a href="{{ url()->previous() }}" >戻る</a>
    </div>
</body>
</html>

@endsection    
