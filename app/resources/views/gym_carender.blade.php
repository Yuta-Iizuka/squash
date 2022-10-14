@extends('layouts.layout')
@section('content')

    <h2> {{ $info->name}} </h2>


    <form action="{{route('gym.reserve',['id' => $info['id']]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">日付</label>
            <input type="date" class="form-control" id="date" name="date" value="" />
        </div>

        <div class="text-right">
        <button type="submit" class="btn btn-primary">日付を選択する</button>
        </div>
    </form>
    </body>
    </html>

@endsection    