
@extends('layouts.layout')
@section('content')
    <?php foreach($info as $data):?>
    <h2> {{ $data['name']}} </h2>
    <?php endforeach;?>

    
    <table>
            <?php foreach($info as $data):?>
            <tr>
                <th scope='col'>予約日</th>
                <td scope='col'>{{ $data['name']}}</td>
            </tr>
            <tr>
                <th scope='col'>予約時間</th>
                <td scope='col'>{{ $data['prif']}}{{ $data['city']}}{{ $data['adress']}}</td>
            </tr>
            <tr>
                <th scope='col'>利用人数</th>
                <td scope='col'>{{ $data['station']}}</td>
            </tr>
             
             <?php endforeach;?>
            
    </table>
</body>
</html>

@endsection    