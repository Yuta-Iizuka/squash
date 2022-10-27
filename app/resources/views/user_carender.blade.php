@extends('layouts.layout')
@section('content')
    <div class="container">
        <h2> {{ $info->name}} </h2>
        
        <div class = 'panel-body'>
            @if($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
            @endif        
        </div>
        <br>
        <div class="row p-sm-3">
            <form action="{{route('user.reserve',['id' => $info['id']]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">日付</label>
                    <input type="date" class="form-control" id="date" name="date" value="" />
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-warning">日付を選択する</button>
                </div>
            </form>       
        </div>
        <a href="{{ url()->previous() }}" >戻る</a>
    </div>
</body>
</html>

@endsection    