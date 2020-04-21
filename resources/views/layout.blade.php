<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"  href="{{ mix('css/app.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    {{--<script src="{{ asset('js/myJs.js') }}"></script>--}}
    <title>WavesMed VideoConversor</title>

</head>
<body >
<nav id="navBar" class="navbar navbar-light">
    <i class="fas fa-bars"></i>
    <a class="nav-item my-1 ml-auto" id="navItem" href="https://www.wavesmed.cmo.br/login/index.php">Acessar</a>
</nav>

<div class="container">


    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="https://www.wavesmed.com.br/login/index.php">
            <img  id="logo" src="http://vcv/images/educacao_saude_logo_site.png" class="d-inline-block align-top">
        </a>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-5">Conversor de vídeo</h1>
        {{--<hr class="my-4">--}}
        <p class="lead" id="descricao"> Converta seus vídeos e reúna-os em um só arquivo mp4.</p>
    </div>


    @yield('content')

</body>

</html>

    @yield('script_session')
