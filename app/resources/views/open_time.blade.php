
@extends('layouts.layout_admin')
@section('content')
    <div class="container">
        <h2> 営業時間</h2>

        <form action="{{route('open.time.complete',['id' => $info[0]['time_id']]) }}" method="POST">
        @csrf
            <table class='table'>
                <tr>
                    <th scope='col'>時間</th>
                    <th scope='col'>オープン/クローズ</th>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_1']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_1" name="term_1" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_1"  name="term_1" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_2']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_2" name="term_2" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_2"  name="term_2" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_3']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_3" name="term_3" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_3"  name="term_3" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_4']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_4" name="term_4" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_4"  name="term_4" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_5']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_5" name="term_5" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_5"  name="term_5" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_6']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_6" name="term_6" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_6"  name="term_6" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_7']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_7" name="term_7" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_7"  name="term_7" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_8']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_8" name="term_8" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_8"  name="term_8" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_9']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_9" name="term_9" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_9"  name="term_9" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                 </tr>
                <tr>
                    <td scope='col'>{{$terms['term_10']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_10" name="term_10" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_10"  name="term_10" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_11']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_11" name="term_11" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_11"  name="term_11" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_12']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_12" name="term_12" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_12"  name="term_12" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td scope='col'>{{$terms['term_13']}}</td>
                    <td>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_13" name="term_13" value="0">
                            <label class="form-check-label" >オープン</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="term_13"  name="term_13" value="1" checked="checked">
                        <label class="form-check-label" >クローズ</label>
                    </div>
                    </td>
                </tr>

            </table>

            <div class="text-right">
                    <button type="submit" class="btn btn-primary">申請</button>
                </div>

            <a href="{{ url()->previous() }}" >戻る</a>
        </form>
        </div>

</body>
</html>

@endsection
