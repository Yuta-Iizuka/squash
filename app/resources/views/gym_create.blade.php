@extends('layouts.layout')
@section('content')
<div class="container">
    <h2> 施設新規登録 </h2>
    <form action="{{ route('new.gym.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label for="tel">電話番号</label>
            <input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" />
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password-confirm">パスワード（確認）</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
        </div>
        <div class="form-group">
            <!-- <label for="division">区分</label> -->
            <input type="hidden" class="form-control" id="division" name="division" value="1" />
        </div>
        <div class="text-right">
        <button type="submit" class="btn btn-primary">次へ</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}" >戻る</a>
    </div>
    
</body>
</html>

@endsection    