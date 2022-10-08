<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>

    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <!-- navタグ（お試し） -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>施設名</th>
                <th scope='col'>アクセス</th>
                <th scope='col'>営業時間</th>
            </tr>
        </thead>
            @foreach($informations as $info)
            <tr>
                <th scope='col'>{{ $info['name']}}</th>
                <th scope='col'>{{ $info['access']}}</th>
                <th scope='col'>{{ $info['start_time']}}~{{ $info['end_time']}}</th>
                <th scope='col'>
                    <a href="{{ route('gym.show', ['id' => $info['id']]) }}">施設詳細</a>
                </th>
            </tr>
            @endforeach

    </table>
</body>
</html>
