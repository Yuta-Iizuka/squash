
@extends('layouts.layout')
@section('content')
<div class="container">
    <h2> {{ $info->name}} </h2>
    <form action="{{route('reserve.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <!-- <label for="information_id">施設ID</label> -->
            <input type="hidden" class="form-control" id="information_id" name="information_id" value="{{ $info->id }}" readonly/>
        </div>
        <div class="form-group">
            <!-- <label for="user_id">ユーザーID</label> -->
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" readonly/>
        </div>
        <div class="form-group">
            <!-- <label for="name">氏名</label> -->
            <input type="hidden" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly/>
        </div>
        <div class="form-group">
            <!-- <label for="tel">電話番号</label> -->
            <input type="hidden" class="form-control" id="tel" name="tel" value="{{ $user->tel }}" readonly/>
        </div>
        <div class="form-group">
            <!-- <label for="email">メールアドレス</label> -->
            <input type="hidden" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly/>
        </div>
        <div class="form-group">
            <label for="date">予約日</label>
            <input type="hidden" class="form-control" id="date" name="date" value="{{ $date }}"/>
            <div>{{ $date }}</div>
        </div>
        <div class="form-group">
            <label for="term">予約時間</label>
            <input type="hidden" class="form-control" id="term" name="term" value= "{{$term}}" readonly/>
            <div>{{ $term }}</div>
        </div>
        <div class="form-group">
            <label for="member">利用人数</label>
            <select name="member">
                @for($i=1; $i < 11; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                </select>           
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}" >戻る</a>
    </div>
    
</body>
</html>

@endsection    