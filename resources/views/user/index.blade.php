@extends('components.layouts')

@section('user-index')
    <div>
        @include('components.navbar')
        @include('components.add-modal-view')
    </div>
    <div class="mt-5 text-4xl font-bold text-center text-black underline">
        Student's Information
    </div>
    <div class="flex items-center justify-center px-1 mx-5 mt-10 md:justify-start md:mx-20">
        <button
            class="px-5 py-2 mb-2 mr-2 md:text-sm text-[13px] font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 hover:duration-300"
            onclick="importToggleModal()">
            <div class="flex items-center justify-center">
                <x-forkawesome-table class="flex w-4 h-4" />
                &nbsp; Import Excel
            </div>
        </button>
        <a href="{{ route('student-download-excel') }}" type="button"
            class="px-5 py-2 mb-2 mr-2 md:text-sm text-[13px] font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 hover:duration-300">
            <div class="flex items-center justify-center">
                <x-fileicon-microsoft-excel class="flex w-4 h-4" />
                &nbsp; Export Excel
            </div>
        </a>
        <a href="{{ route('student-download-pdf') }}" type="button"
            class="px-5 py-2 mb-2 mr-2 md:text-sm text-[13px] font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 hover:duration-300">
            <div class="flex items-center justify-center">
                <x-bi-file-earmark-pdf-fill class="flex w-4 h-4" />
                &nbsp; Export PDF
            </div>
        </a>
    </div>
    <div class="p-3 mx-5 mt-1 mb-10 bg-gray-300 rounded-lg shadow-lg md:mx-20 outline outline-0">
        @include('components.student-table')
    </div>
    @include('components.import-excel')
@endsection
