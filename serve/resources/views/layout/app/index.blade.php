<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Contact-Book</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-nav></x-nav>

    <main class="main-variant">
        @yield('content')
    </main>


</body>

</html>
