<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KUGA Barbershop - Barbershop modern dengan layanan premium untuk pria. Potong rambut, styling, grooming terbaik.">
    <meta name="keywords" content="barbershop, potong rambut, grooming, KUGA, barbershop modern">
    <title>KUGA Barbershop - Life Begins After Haircut</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- HEADER & NAVIGATION -->
    @include('kuga.partials.header')

    <div class="content">
        @yield('content')
    </div>

    <!-- FOOTER -->
    @include('kuga.partials.footer')


    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>