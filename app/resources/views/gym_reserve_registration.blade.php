
@extends('layouts.layout_admin')
@section('content')
<div class="container">
    <h2> {{ $info->name }} </h2>
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
            <label class="col-sm-2 col-form-label col-form-label-lg" for="date">予約日</label>
            <input type="hidden" class="form-control" id="date" name="date" value="{{ $date }}"/>
            <h4>{{ $date }}</h4>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="term">予約時間</label>
            <input type="hidden" class="form-control" id="term" name="term" value= "{{$term}}" readonly/>
            <h4>{{ $term }}</h4>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-form-label col-form-label-lg" for="member">利用人数</label>
            <div>
            <select class="form-select form-select-lg mb-3" name="member">
                @for($i=1; $i < 11; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>  
            </div>         
        </div>

        <div class="text-left">
        <button type="submit" class="btn btn-success">予約する</button>
        </div>
    </form>
    </form>
    <a href="{{ url()->previous() }}" >戻る</a>
    </div>
    
</body>
</html>

@endsection    