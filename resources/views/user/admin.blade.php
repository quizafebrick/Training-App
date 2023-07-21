@extends('components.layouts')

@section('user-index-admin')
    <div>
        @include('components.navbar')
        @include('components.admin-tabs')
    </div>

    <div class="mt-5 text-4xl font-bold text-center text-black underline">
        Admin User
    </div>
    @include('components.add-user')
@endsection
