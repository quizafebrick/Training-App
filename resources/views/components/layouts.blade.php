<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training</title>
    {{-- * SWEETALERT2 * --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- * JQUERY CDN * --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    {{-- * DATATABLES * --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

</head>

<body class="overflow-auto">
    {{-- * VITE * --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('components.messages')
    @yield('login')
    @yield('registration')

    {{-- * LOGGED IN USER * --}}
    {{-- * DASHBOARD * --}}
    @yield('user-index')
    @yield('user-index-admin')

    {{-- * STUDENTS * --}}
    @yield('add-student')
    @yield('edit-student')
    @yield('pdf-download-view')
    @yield('user-index-students')

    {{-- * ANNOUNCEMENTS * --}}
    @yield('user-index-announcements')
    @yield('add-announcement')
    @yield('edit-announcement')

    {{-- * ALL SCRIPTS * --}}
    @include('components.scripts')
</body>

</html>
