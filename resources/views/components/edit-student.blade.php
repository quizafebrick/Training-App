@extends('components.layouts')

@section('edit-student')
    <div>
        @include('components.admin-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <div class="p-4 bg-white border-2 border-dashed rounded-lg md:p-5 border-slate-200">
                <div class="mt-2 text-4xl font-bold text-center text-black underline">
                    Student Profile Edit
                </div>
                <div class="w-full">
                    {{-- ! ERROR MESSAGE ! --}}
                    @include('components.error-message')
                </div>
                <div>
                    @include('components.edit-student-form')
                </div>
            </div>
        </div>
    </div>
@endsection
