@extends('components.layouts')

@section('user-index')
    <div>
        @include('components.navbar')
        @include('components.add-modal-view')
    </div>
    <div class="mt-5 text-4xl font-bold text-center text-black underline">
        Student's Information
    </div>
    <div class="p-3 mx-5 mt-10 bg-gray-300 rounded-lg shadow-lg md:mx-20 outline outline-0">
        @include('components.student-table')
    </div>
@endsection
