@extends('layouts.layout')
@section('content')

<h2>イベント一覧</h2>
<div class="container">
        <h3>イベント一覧</h3>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>イベント日</th>
                    <th scope='col'>イベント名</th>
                </tr>
            </thead>
                @foreach($events as $event)
                <tr>
                    <td scope='col'>{{ $event['date']}}</td>
                    <td scope='col'>{{ $event['event_name']}}</td>
                    <td scope='col'>
                        <a href="{{route('event.edit',['id' => $event['id']])}}">編集する</a>
                    </td>
                </tr>
                @endforeach
        </table>

        

    </div>
</body>
</html>

@endsection  