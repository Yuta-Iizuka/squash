
@extends('layouts.layout')
@section('content')
    <?php foreach($info as $data):?>
    <h2> {{ $data['name']}} </h2>
    <?php endforeach;?>


    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
        </div>
        <div class="form-group">
            <label for="tel">電話番号</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" />
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label for="date">予約日</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}"/>
        </div>
        <div class="form-group">
            <label for="term">予約時間</label>
            <input type="time" class="form-control" id="term" name="term" value="{{ old('term') }}"/>
        </div>
        <div class="form-group">
            <label for="member">利用人数</label>
            <input type="text" class="form-control" id="member" name="member" value="人"/>
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>

    
    <!-- <table>
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
            
    </table> -->
</body>
</html>

@endsection    