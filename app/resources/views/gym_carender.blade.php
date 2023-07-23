@extends('layouts.layout')
@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>

    $(function() {
        $('.reserve').on('click', function() {
            var id =  id ;//thanksを送りたい回答の主キー"id"
            var date = $("#date").val();

            $.ajax({

                type: 'post',
                url: "{{route('gym.reserve',['id' => $info[0]['id']]) }}", // url: は読み込むURLを表す
                // dataType: 'json', // 読み込むデータの種類を記入
                data : {//③
                    'id':id,
                    'date':date
                },
                headers: {
                // POSTのときはトークンの記述がないと"419 (unknown status)"になるので注意
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            }).done(function(data){
                $('#ajax_result').html(data['form']);
            }).fail(function(XMLHttpRequest, textStatus, errorThrown){
                alert('日付を選択してください');
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
            });
            }
        );
    });
</script>
<div class="container">
        <h2> {{ $info[0]['name'] }} </h2>
        <div class="d-flex justify-content-end">
            <a href="{{ route('index') }}" class="btn btn-info">戻る</a>
        </div>
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
        <div class="row p-sm-3 d-flex justify-content-start">
            <div class="">
                <input type="date" class="form-control" id="date" name="date" value="" />
            </div>
            <div class="reserve-botton">
                <button type="submit" id="button" class="btn btn-warning reserve">予約状況を表示する</button>
            </div>
            <div class="reserve-botton">

            </div>
        </div>
    </div>

    <div id="ajax_result"></div>

</body>
</html>

@endsection

