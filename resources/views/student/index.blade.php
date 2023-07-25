@extends('student-components.layouts')

@section('student-index')
    <div>
        @include('student-components.student-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <div class="p-4 border-2 border-dashed rounded-lg md:p-5 bg-slate-100 border-slate-200">
                <div class="mt-2 text-4xl font-bold text-center text-black underline">
                    Announcements
                </div>
                <div class="mt-1">
                    @if ($activeAnnouncements->isEmpty())
                        <div class="mx-10 mb-10">
                            <div class="w-full text-center text-white shadow-lg ">
                                <div class="p-4 bg-gray-900 rounded-lg">
                                    <div class="text-2xl font-bold">
                                        <p>No Announcement/s yet so far.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @include('student-components.announcement-carousel')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
