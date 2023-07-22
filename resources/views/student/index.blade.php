@extends('student-components.layouts')

@section('student-index')
    <div>
        @include('student-components.student-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="border-2 border-gray-400 border-dashed rounded-lg shadow-lg mt-14">
            <div class="mt-5 text-4xl font-bold text-center text-black underline">
                Announcements
            </div>

            @include('student-components.announcement-carousel')
        </div>
    </div>
@endsection
