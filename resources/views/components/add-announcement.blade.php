@extends('components.layouts')

@section('add-announcement')
    <div>
        @include('components.admin-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg mt-14">
            <div class="mt-5 text-4xl font-bold text-center text-black underline">
                Announcement/Add
            </div>
            <div class="flex items-center justify-center">
                @include('components.add-announcement-form')
            </div>
        </div>
    </div>
@endsection
