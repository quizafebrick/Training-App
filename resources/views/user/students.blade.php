@extends('components.layouts')

@section('user-index-students')
    <div>
        @include('components.navbar')
        @include('components.admin-tabs')
    </div>


    <div class="mt-5 text-4xl font-bold text-center text-black underline">
        Student's Information
    </div>

    {{-- ! ERROR MESSAGE ! --}}
    @include('components.error-message')

    <div class="flex items-center justify-center px-1 mx-5 mt-5 md:justify-start md:mx-20">
        {{-- * MEDIUM SIZE FLEX * --}}
        <div class="hidden md:flex">
            <a href="{{ route('student-add') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900 hover:duration-300">
                <div class="flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd" />
                    </svg>
                    &nbsp; Add
                </div>
            </a>
            <a href="{{ route('student-download-pdf') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 hover:duration-300">
                <div class="flex items-center justify-center">
                    <x-bi-file-earmark-pdf-fill class="flex w-4 h-4" />
                    &nbsp; Export PDF
                </div>
            </a>
            <button
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 hover:duration-300"
                onclick="importToggleModal()">
                <div class="flex items-center justify-center">
                    <x-forkawesome-table class="flex w-4 h-4" />
                    &nbsp; Import Excel
                </div>
            </button>
            <a href="{{ route('student-download-excel') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 hover:duration-300">
                <div class="flex items-center justify-center">
                    <x-fileicon-microsoft-excel class="flex w-4 h-4" />
                    &nbsp; Export Excel
                </div>
            </a>
        </div>

        {{-- * SMALL SIZE FLEX * --}}
        <div class="flex md:hidden">
            <a href="{{ route('student-add') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900 hover:duration-300">
                <div class="flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd" />
                    </svg>
                    &nbsp; Add
                </div>
            </a>
            <a href="{{ route('student-download-pdf') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 hover:duration-300">
                <div class="flex items-center justify-center mt-1">
                    <x-bi-file-earmark-pdf-fill class="w-4 h-4" />
                    &nbsp; Export
                </div>
            </a>
            <button
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 hover:duration-300"
                onclick="importToggleModal()">
                <div class="flex items-center justify-center">
                    <x-forkawesome-table class="flex w-4 h-4" />
                    &nbsp; Import
                </div>
            </button>
            <a href="{{ route('student-download-excel') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 md:text-sm text-[12px] font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 hover:duration-300">
                <div class="flex items-center justify-center mt-1">
                    <x-fileicon-microsoft-excel class="w-4 h-4" />
                    &nbsp; Export
                </div>
            </a>
        </div>
    </div>
    <div class="p-3 mx-5 mt-1 mb-10 bg-gray-300 rounded-lg shadow-lg md:mx-20 outline outline-0">
        @include('components.student-table')
    </div>
    @include('components.import-excel')
@endsection
