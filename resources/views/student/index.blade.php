@extends('student-components.layouts')

@section('student-index')
    <div>
        @include('student-components.student-navbar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <div class="p-5 bg-gray-900 rounded-lg">
                <div class="mt-2 text-4xl font-bold text-center text-white underline">
                    Announcements
                </div>
                <div class="mt-5">
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
