<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <link rel="stylesheet"  href="{{ mix('css/app.css') }}">

    <title>WavesMed VideoConversor</title>
</head>
<body>
    <div class="container">
    @yield('content')
    </div>
<script src="{{ mix('js/app.js') }}"></script>

</body>
@yield('script_session')
</html>

