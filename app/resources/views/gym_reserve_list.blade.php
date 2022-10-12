
@extends('layouts.layout')
@section('content')
    <?php foreach($info as $data):?>
    <h2> {{ $data['name']}} </h2>
    <?php endforeach;?>
    <input type="date"></input>


    <table class='table'>
            <tr>
                <th scope='col'>時間</th>
                <th scope='col'>予約状況</th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_1']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_2']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_3']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_4']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_5']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_6']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_7']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_8']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_9']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_10']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_11']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_12']}}</th>
                <th scope='col'></th>
            </tr>
            <tr>
                <th scope='col'>{{$terms['term_13']}}</th>
                <th scope='col'></th>
            </tr>
            


    </table>
</body>
</html>

@endsection    
