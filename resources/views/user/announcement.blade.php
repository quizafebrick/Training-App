@extends('components.layouts')

@section('user-index-announcements')
    <div>
        @include('components.admin-navbar')
        {{-- @include('components.admin-tabs') --}}
    </div>

    <div class="p-4 sm:ml-64">
        <div class="border-2 border-gray-400 border-dashed rounded-lg mt-14">
            <div class="mt-5 text-4xl font-bold text-center text-black underline">
                Announcements
            </div>
            <div class="flex items-center justify-center px-1 mx-5 mt-5 md:justify-start md:mx-10">
                <a href="{{ route('announcement-add') }}" type="button"
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
            </div>

            <div class="flex items-center justify-center px-1 mx-5 md:justify-start md:mx-10">
                <div class="w-full p-3 mb-10 bg-gray-300 rounded-lg shadow-lg ">
                    @include('components.announcement-table')
                </div>
            </div>
        </div>
    </div>
@endsection
