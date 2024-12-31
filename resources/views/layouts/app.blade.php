<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sb-glora.min.css') }}">
    @stack('css')
    <title>Form Pendaftaran Glora</title>
</head>

<body style="min-height: 100vh">

    <div class="container mb-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/sb-glora.min.js') }}"></script>
    @stack('js')
</body>

</html>
