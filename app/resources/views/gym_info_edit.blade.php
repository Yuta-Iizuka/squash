@extends('layouts.layout')
@section('content')
<div class="container">
    <h2> 施設情報編集 </h2>
    @foreach($informations as $info)
    <form action="{{ route('info.edit.complete', ['id' => $info['id']] ) }}" method="POST">
        @csrf
        <div class="form-group">
            <!-- <label for="event_id">イベントID</label> -->
            <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $info['event_id'] }}" />
        </div>
        <div class="form-group">
            <!-- <label for="time_id">タイムID</label> -->
            <input type="hidden" class="form-control" id="time_id" name="time_id" value="{{ $info['time_id'] }}" />
        </div>
        <div class="form-group">
            <label for="name">施設名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $info['name'] }}" />
        </div>
        <div class="form-group">
            <label for="prif">都道府県</label>
            <input type="text" class="form-control" id="prif" name="prif" value="{{ $info['prif'] }}" />
        </div>
        <div class="form-group">
            <label for="city">市区町村</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $info['city'] }}" />
        </div>
        <div class="form-group">
            <label for="adress">丁目・番地・マンション（アパート）名</label>
            <input type="text" class="form-control" id="adress" name="adress" value="{{ $info['adress'] }}" />
        </div>
        <div class="form-group">
            <label for="station">最寄り駅</label>
            <input type="text" class="form-control" id="station" name="station" value="{{ $info['station'] }}">
        </div>
        <div class="form-group">
            <label for="access">アクセス</label>
            <input type="text" class="form-control" id="access" name="access" value="{{ $info['access'] }}">
        </div>
        <div class="form-group">
            <label for="tel">電話番号</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="{{ $info['tel'] }}">
        </div>
        <div class="form-group">
            <label for="holiday">定休日</label>
            <input type="text" class="form-control" id="holiday" name="holiday" value="{{ $info['holiday'] }}">
        </div>
        <div class="form-group">
            <label for="start_time">営業開始時間</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $info['start_time'] }}">
        </div>
        <div class="form-group">
            <label for="end_time">営業終了時間</label>
            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $info['end_time'] }}">
        </div>
        <div class="form-group">
            <label for="price">利用料金</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $info['price'] }}">
        </div>
        <div class="form-group">
            <label for="lat">経度</label>
            <input type="text" class="form-control" id="lat" name="lat" value="{{ $info['lat'] }}">
        </div>
        <div class="form-group">
            <label for="lng">緯度</label>
            <input type="text" class="form-control" id="lng" name="lng" value="{{ $info['lng'] }}">
        </div>
        <div class="form-group">
            <!-- <label for="check_id">内容チェック</label> -->
            <input type="hidden" class="form-control" id="check_id" name="check_id" value="{{ $info['check_id'] }}" />
        </div>
        <div class="text-right">
        <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
    
    @endforeach
    </div>
    
</body>
</html>

@endsection    