
@extends('layouts.layout')
@section('content')
    <h2> {{ $info->name}} </h2>


    <form action="" method="POST">
        @csrf
        <!-- <div class="form-group">
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
        </div> -->
        <div class="form-group">
            <label for="date">予約日</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $date }}"/>
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

    
</body>
</html>

@endsection    