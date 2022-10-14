
@extends('layouts.layout')
@section('content')
    <h2> {{ $info->name}} </h2>
    <input type="date"></input>


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
                <td><button type="button" class="btn btn-outline-primary">
                    <a href="{{route('reserve.create.user',['userId'=> Auth::user()->id, 'infoId'=> $info->id, 'term'=> 'term_1'])}}">予約</a>
                </button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_2']}}</td>
                @if($info->term_2 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_3']}}</td>
                @if($info->term_3 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_4']}}</td>
                @if($info->term_4 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_5']}}</td>
                @if($info->term_5 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_6']}}</td>
                @if($info->term_6 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_7']}}</td>
                @if($info->term_7 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_8']}}</td>
                @if($info->term_8 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_9']}}</td>
                @if($info->term_9 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_10']}}</td>
                @if($info->term_10 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_11']}}</td>
                @if($info->term_11 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_12']}}</td>
                @if($info->term_12 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
            <tr>
                <td scope='col'>{{$terms['term_13']}}</td>
                @if($info->term_13 == 0)
                <td scope='col'>〇</td>
                <td><button type="button" class="btn btn-outline-primary"><a>予約</a></button></td>
                @else
                <td scope='col'>×</td>
                @endif
            </tr>
    </table>
</body>
</html>

@endsection    
