@extends('layouts.layout')
@section('content')

<h2>イベント日登録</h2>
<div class="container">
    <form action="{{route('event.create.complete')}}" method="POST">
        @csrf
        <div class="form-group">
            <!-- <label for="information_id">施設ID</label> -->
            <input type="hidden" class="form-control" id="information_id" name="information_id" value="{{ $id }}" readonly/>
        </div>
        <div class="form-group">
            <label for="date">イベント日</label>
            <input type="date" class="form-control" id="date" name="date" />
        </div>
        <div class="form-group">
            <label for="event_name">イベント名（休みの理由）</label>
            <input type="text" class="form-control" id="event_name" name="event_name" />
        </div>
        <div class="text-right">
        <button type="submit" class="btn btn-primary">登録</button>
       
    </form>
</div>
</body>
</html>

@endsection  