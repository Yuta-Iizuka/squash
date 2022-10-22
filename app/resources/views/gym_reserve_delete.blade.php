@extends('layouts.layout')
@section('content')
<div class="container">
    <form action="{{route('gym.delete.complete', ['id' => $reserve_id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="information_name">施設名</label>
            <input type="hidden" class="form-control" id="information_name" name="information_name" value="{{ $reservation->name }}" readonly/>
            <div>{{ $reservation->name }}</div>
        </div>
        <div class="form-group">
            <label for="date">予約日</label>
            <input type="hidden" class="form-control" id="date" name="date" value="{{ $reservation->date }}" readonly/>
            <div>{{ $reservation->date }}</div>
        </div>
        <div class="form-group">
            <label for="term">予約時間</label>
            <input type="hidden" class="form-control" id="term" name="term" value= "{{ $reservation->term }}" readonly />
            <div>{{ $reservation->term }}</div>
        </div>
        <div class="form-group">
            <label for="member">利用人数</label>
            <input type="hidden" class="form-control" id="member" name="member" value="{{ $reservation->member }}" readonly />
            <div>{{ $reservation->member }}</div>            
        </div>
        <div class="form-group">
            <!-- <label for="idr">id</label> -->
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $reserve_id }}" readonly />            
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">キャンセル</button>
       
    </form>
</div>
</body>
</html>

@endsection  