@extends('layouts.layout_admin')
@section('content')
    <div class="container">
        <h2> {{ $info['0']['name']}} </h2>


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
        <div class="row mx-5">
        <br>
        <form action="{{route('check.reserve',['id' => $info['0']['id']]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">日付</label>
                <input type="date" class="form-control" id="date" name="date" value="" />
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">日付を選択する</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>

@endsection
