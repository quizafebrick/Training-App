<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training</title>
    {{-- * VITE * --}}
    {{-- * SWEETALERT2 * --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- * FLOWBITE * --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- * JQUERY CDN * --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- * AJAX * --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- * JQUERY UI CDN * --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

    {{-- * DATATABLES * --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.0/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    @livewireStyles
    {{-- * ALPINE FOCUS * --}}
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    {{-- * ALPINE V3 * --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.messages')
    @yield('login')
    @yield('registration')

    {{-- * LOGGED IN USER * --}}
    @yield('user-index')
    @yield('edit-student')

    <script src="{{ asset('js/add-modal.js') }}"></script>
    <script src="{{ asset('js/edit-modal.js') }}"></script>
    <script src="{{ asset('js/delete-modal.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/edit-datepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable({
                scrollX: true,
            });
        });
    </script>

    @livewireScripts
    @livewire('livewire-ui-modal')
</body>

</html>
