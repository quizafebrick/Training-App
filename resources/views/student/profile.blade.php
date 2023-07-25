@extends('student-components.layouts')

@section('student-profile')
    <div>
        @include('student-components.student-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <div class="p-4 border-2 border-dashed rounded-lg md:p-5 bg-slate-100 border-slate-200">
                <div class="mt-2 text-4xl font-bold text-center text-black underline">
                    Profile
                </div>
                <div class="w-full">
                    {{-- ! ERROR MESSAGE ! --}}
                    @include('components.error-message')
                </div>
                <div>
                    @include('student-components.profile-view')
                </div>
            </div>
        </div>
    </div>
@endsection
