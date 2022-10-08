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
    <thead>
        <tr>
            <th scope='col'>施設名</th>
            <th scope='col'>住所</th>
            <th scope='col'>最寄り駅</th>
            <th scope='col'>アクセス</th>
            <th scope='col'>電話番号</th>
            <th scope='col'>定休日</th>
            <th scope='col'>営業時間</th>
            <th scope='col'>利用料金</th>
        </tr>
    </thead>
        <tr>   
            <th scope='col'>{{ optional($informations)->name}}</th>
            <th scope='col'>{{ optional($informations)->prif}}{{ optional($informations)->city}}{{ optional($informations)->adress}}</th>
            <th scope='col'>{{ optional($informations)->station}}</th>
            <th scope='col'>{{ optional($informations)->access}}</th>
            <th scope='col'>{{ optional($informations)->tel}}</th>
            <th scope='col'>{{ optional($informations)->holiday}}</th>
            <th scope='col'>{{ optional($informations)->start_time}}~{{ optional($informations)->end_time}}</th>
            <th scope='col'>{{ optional($informations)->price}}</th>
        </tr>
</body>
</html>