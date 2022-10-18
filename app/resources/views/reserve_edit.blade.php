@extends('layouts.layout')
@section('content')
<div class="container">
    <form action="{{route('reserve.edit.complete', ['id' => $reserve_id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="information_name">施設名</label>
            <input type="text" class="form-control" id="information_name" name="information_name" value="{{ $reservation->name }}" readonly/>
        </div>
        <div class="form-group">
            <label for="date">予約日</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $reservation->date }}" readonly/>
        </div>
        <div class="form-group">
            <label for="term">予約時間</label>
            <input type="text" class="form-control" id="term" name="term" value= "{{ $reservation->term }}" readonly />
        </div>
        <div class="form-group">
        <label for="member">利用人数</label>
            <select name="member">
                <option selected>{{ $reservation->member }}</option>
                @for($i=1; $i < 11; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>           
        </div>
        <div class="form-group">
            <!-- <label for="idr">id</label> -->
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $reserve_id }}"  />            
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">変更する</button>
       
    </form>
</div>
</body>
</html>

@endsection  