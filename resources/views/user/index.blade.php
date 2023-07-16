@extends('components.layouts')

@section('user-index')
    <div>
        @include('components.navbar')
        @include('components.add-modal-view')
    </div>
    <div class="mt-5 text-4xl font-bold text-center text-black underline">
        Student's Information
    </div>
    <div class="p-3 mx-5 mt-10 mb-10 bg-gray-300 rounded-lg shadow-lg md:mx-20 outline outline-0">
        <div class="flex items-center justify-center p-2">
            <a href="#" type="button"
                class="px-5 py-2 mb-2 mr-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 hover:duration-300">
                Import Excel
            </a>
            <a href="#" type="button"
                class="px-5 py-2 mb-2 mr-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 hover:duration-300">
                Export Excel
            </a>
            {{-- <a href="{{ route('student-download-pdf') }}" type="button"
                class="px-5 py-2 mb-2 mr-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 hover:duration-300">
                Export PDF
            </a> --}}
            <form action="{{ route('student-download-pdf') }}" method="POST" target="__blank">
                @csrf
                <button type="submit"
                    class="px-5 py-2 mb-2 mr-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 hover:duration-300">
                    Export PDF
                </button>
            </form>
        </div>
        @include('components.student-table')
    </div>
@endsection
