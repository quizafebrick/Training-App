<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training</title>
    {{-- * VITE * --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- * SWEETALERT2 * --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('components.messages')
    @yield('login')
    @yield('registration')

    {{-- * LOGGED IN USER * --}}
    @yield('user-index')

</body>

</html>
