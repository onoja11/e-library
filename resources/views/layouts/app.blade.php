<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title :  config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
  <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-qJYIGmJq5nN9F5nUgVYf1tPjVqzzAcB4y1UbZ3dV5DgKqlFgTjj6NIE1n4I0ShmF" 
        crossorigin="anonymous">
            <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css'])
</head>
<body >
    <div id="app">
        @include('partials.navbar')

        <main class="">
            @yield('content')
        </main>


        @include('partials.footer')
        @include('sweetalert::alert')
    </div>
       <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-rUgV4nDp8Y2FNRK5hJDfS5Y5e0bfl4N1U3E9uvcgX9hj2i2qSo4TyfZB2V7xH3Jt" 
        crossorigin="anonymous">
    </script>
</body>
</html>
