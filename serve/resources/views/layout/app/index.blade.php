<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Contact-Book</title>

    <link rel="stylesheet" href="{{ asset('build/assets/app-0a855b6c.css') }}">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <x-nav></x-nav>

    <main class="main-variant">
        @yield('content')
    </main>

    <script src=" {{ asset('build/assets/app-ac284167.js') }} "></script>
</body>

</html>
