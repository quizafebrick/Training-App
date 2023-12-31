@extends('components.layouts')

@section('user-index')
    <div>
        @include('components.admin-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="border-2 border-gray-400 border-dashed rounded-lg mt-14">
            <div class="">
                <div class="mt-5 text-4xl font-bold text-center underline">
                    Dashboard
                </div>
                <div class="p-4 mx-5 mt-5 mb-10 bg-gray-300 rounded-lg shadow-lg md:mx-10">
                    <div>
                        <div class="bg-white rounded-lg">
                            <div class="pt-5 text-3xl font-bold text-center">
                                All Student's Statistics
                            </div>
                            <div class="p-5">
                                <div class="grid grid-cols-1">
                                    <div id="gender_pie_chart" class="md:w-full md:h-96 w-62 h-62"></div>
                                    <div id="students_line_chart" class="w-62 h-62 md:w-full md:h-96"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- * GENDER PIE CHART * --}}
    @include('components.gender-pie-chart')
    {{-- * STUDENT LINE CHART * --}}
    @include('components.students-line-chart')
@endsection
