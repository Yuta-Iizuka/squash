@extends('layouts.layout_admin')
@section('content') 
<div class="container">
    <?php foreach($info as $data):?>
        <h3>  {{ $data['name'] }} </h3> 
        
        <table class="table  table-striped">
                <tr>
                    <th scope='col'>施設名</th>
                    <td scope='col'>{{ $data['name']}}</td>
                </tr>
                <tr>
                    <th scope='col'>住所</th>
                    <td scope='col'>{{ $data['prif']}}{{ $data['city']}}{{ $data['adress']}} <a href="{{ route('google.map',['id' => $data['id']]) }}">  Google Map</a></td>
                </tr>
                <tr>
                    <th scope='col'>最寄り駅</th>
                    <td scope='col'>{{ $data['station']}}</td>
                </tr>
                <tr>
                    <th scope='col'>アクセス</th>
                    <td scope='col'>{{ $data['access']}}</td>
                </tr>
                <tr>
                    <th scope='col'>電話番号</th>
                    <td scope='col'>{{ $data['tel']}}</td>
                </tr>
                <tr>
                    <th scope='col'>定休日</th>
                    <td scope='col'>{{ $data['holiday']}}</td>
                </tr>
                <tr>
                    <th scope='col'>営業時間</th>
                    <td scope='col'>{{ $data['start_time']}}~{{ $data['end_time']}}</td>
                </tr>
                <tr>
                    <th scope='col'>利用料金</th>
                    <td scope='col'>{{ $data['price']}}</td>
                </tr>        
        </table>
        <?php endforeach;?>

    </div>
</body>
</html>

@endsection    