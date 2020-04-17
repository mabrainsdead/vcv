<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"  href="{{ mix('css/app.css') }}">
    <link rel="stylesheet"  href="{{ '/css/style.css' }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ '/js/dropzone.js' }}"> </script>
    <title>WavesMed VideoConversor</title>

</head>
<body>

    @yield('content')

</body>

</html>

    @yield('script_session')
