@extends('layouts.layout_admin')
@section('content')

<!-- <script>
    function(){
        $('input:file').change(
                if ($(this).val()) {
                    $('button:submit').attr('disabled',false);
                }

            );
    };
</script> -->

<div class="container">
    <h2>画像登録</h2>

    @if(!empty($image))
    <h3>登録画像</h3>
    <div class="low">
        <?php foreach($image as $images):?>
                <div class="">
                    <div class="col-md-4">
                        <img  src="{{ asset($images->path) }}" class="img-fluid w-50 p-3 ">
                    </div>
                    <form method="POST" action="{{ route('delete.image',['id' => $images['id'], 'infoId' => $informations['id']] ) }}" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-primary">削除</button>
                    </form>
                </div>
        <?php endforeach;?>
    </div>
    @endif

    <form method="POST" action="{{ route('upload.image',['id' => $informations['id']]) }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary" >アップロード</button>
    </form>


@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif

</div>
</body>
</html>

@endsection
