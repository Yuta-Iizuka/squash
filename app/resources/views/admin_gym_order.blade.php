
@extends('layouts.layout')
@section('content')
    <div class="container">
        <h2>管理者専用ページ</h2><br>

        @foreach($admin as $info)
        <form action= "{{route('admin.gym.order.complete', ['id' => $info['id']]) }}" method="POST">
        @csrf
        
        <div class="form-group">
            <!-- <label for="event_id">イベントID</label> -->
            <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $info['event_id']}}" />
        </div>
        <div class="form-group">
            <!-- <label for="time_id">タイムID</label> -->
            <input type="hidden" class="form-control" id="time_id" name="time_id" value="{{ $info['time_id']}}" />
        </div>
        <div class="form-group">
            <label for="name">施設名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $info['name']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="prif">都道府県</label>
            <input type="text" class="form-control" id="prif" name="prif" value="{{ $info['prif']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="city">市区町村</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $info['city']}}" readonly />
        </div>
        <div class="form-group">
            <label for="adress">丁目・番地・マンション（アパート）名</label>
            <input type="text" class="form-control" id="adress" name="adress" value="{{ $info['adress']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="station">最寄り駅</label>
            <input type="text" class="form-control" id="station" name="station" value="{{ $info['station']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="access">アクセス</label>
            <input type="text" class="form-control" id="access" name="access" value="{{ $info['access']}}" readonly />
        </div>
        <div class="form-group">
            <label for="tel">電話番号</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="{{ $info['tel']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="holiday">定休日</label>
            <input type="text" class="form-control" id="holiday" name="holiday" value="{{ $info['holiday']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="start_time">営業開始時間</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $info['start_time']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="end_time">営業終了時間</label>
            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $info['end_time']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="price">利用料金</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $info['price']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="lat">経度</label>
            <input type="text" class="form-control" id="lat" name="lat" value="{{ $info['lat']}}" readonly/>
        </div>
        <div class="form-group">
            <label for="lng">緯度</label>
            <input type="text" class="form-control" id="lng" name="lng" value="{{ $info['lng']}}" readonly/>
        </div>
        <div class="form-group">
            <!-- <label for="check_id">内容チェック</label> -->
            <input type="hidden" class="form-control" id="check_id" name="check_id" value="0" />
        </div>
        <div class="text-right">
        <button type="submit" class="btn btn-primary">承認</button>
        </div>
        @endforeach
    </form>
        

    </div>
    
</body>
</html>

@endsection   