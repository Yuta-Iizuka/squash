
@extends('layouts.layout')
@section('content') 
    <table>
            <?php foreach($info as $data):?>
            <tr>
                <th scope='col'>施設名</th>
                <td scope='col'>{{ $data['name']}}</td>
            </tr>
            <tr>
                <th scope='col'>住所</th>
                <td scope='col'>{{ $data['prif']}}{{ $data['city']}}{{ $data['adress']}}</td>
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
             
             <?php endforeach;?>
            
    </table>
</body>
</html>

@endsection    