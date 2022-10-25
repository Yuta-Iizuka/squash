
@extends('layouts.layout')
@section('content')
<div class="container">
    <h2>{{ $date }}は{{ $event->event_name }}のため予約不可の日です。申し訳ございません。</h2>
    <a href="{{ url()->previous() }}" >戻る</a> 
</div>
</body>
</html>

@endsection   