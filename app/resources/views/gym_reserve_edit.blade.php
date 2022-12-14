@extends('layouts.layout')
@section('content')
<div class="container">
    <form action="{{route('gym.reserve.edit.complete', ['id' => $reserve_id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">予約名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $reservation->name }}" readonly/>
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
            <!-- <label for="id">予約ID</label> -->
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $reserve_id }}"  />            
        </div>
        <div class="form-group">
            <!-- <label for="information_id">施設ID</label> -->
            <input type="hidden" class="form-control" id="information_id" name="information_id" value="{{ $reservation->information_id }}"  />            
        </div>

        <div class="form-group">
            <!-- <label for="user_id">ユーザーID</label> -->
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user_id }}"  />            
        </div>
        
        <div class="form-group">
            <!-- <label for="tel">電話番号</label> -->
            <input type="hidden" class="form-control" id="tel" name="tel" value="{{ $reservation->tel }}"  />            
        </div>

        <div class="form-group">
            <!-- <label for="email">メールアドレス</label> -->
            <input type="hidden" class="form-control" id="email" name="email" value="{{ $reservation->email }}"  />            
        </div>
        
        <div class="text-right">
        <button type="submit" class="btn btn-primary">変更する</button>
       
    </form>
</div>
</body>
</html>

@endsection  