@extends('components.layouts')

@section('user-index')
    @include('components.navbar')

    {{-- <script>
        window.onload = function() {
            if (typeof history.pushState === "function") {
                history.pushState("jibberish", null, null);
                window.onpopstate = function() {
                    history.pushState('newjibberish', null, null);
                };
            } else {
                var ignoreHashChange = true;
                window.onhashchange = function() {
                    if (!ignoreHashChange) {
                        ignoreHashChange = true;
                        window.location.hash = Math.random();
                    } else {
                        ignoreHashChange = false;
                    }
                };
            }
        }
    </script> --}}
@endsection
