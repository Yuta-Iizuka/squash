@extends('layouts.layout_admin')
@section('content')


<div class="container">
<h2>イベント日編集</h2>
    @foreach($events as $event)
    <form action="{{route('event.edit.complete',['id' => $event['id']]) }}" method="POST">
        @csrf
        <div class="form-group">
            <!-- <label for="information_id">施設ID</label> -->
            <input type="hidden" class="form-control" id="information_id" name="information_id" value="{{ $event['information_id'] }}" />
        </div>
        <div class="form-group">
            <label for="date">イベント日</label>
            <input type="date" class="form-control" id="date" name="date"  value="{{ $event['date'] }}"/>
        </div>
        <div class="form-group">
            <label for="event_name">イベント名（休みの理由）</label>
            <input type="text" class="form-control" id="event_name" name="event_name"  value="{{ $event['event_name'] }}"/>
        </div>
        <div class="text-right">
        <button type="submit" class="btn btn-success">更新</button>
       
    </form>
    @endforeach
</div>
</body>
</html>

@endsection  