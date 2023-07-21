@extends('components.layouts')

@section('edit-announcement')
    <div>
        @include('components.navbar')
        @include('components.admin-tabs')
    </div>

    <div class="flex items-center justify-center">
        <div class="mt-5 mb-5 bg-gray-200 rounded-lg shadow-xl">
            <form action="{{ route('announcement-update', $announcementDetails->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="inline-block mx-5 mt-5 mb-5 text-left transition-all transform bg-whiteshadow-xl w-fit align-center sm:align-center"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="pt-5 text-2xl font-bold text-center text-black bg-white rounded-t-lg">
                        <div class="underline">
                            Update Announcement
                        </div>
                        <div class="w-full">
                            {{-- ! ERROR MESSAGE ! --}}
                            @include('components.error-message')
                        </div>
                    </div>
                    <div class="grid grid-cols-1 px-5 pt-3 pb-4 bg-white md:grid-cols-3 md:gap-x-3 gap-y-3">
                        <div>
                            <label for="title" class="block mb-1 text-sm font-medium text-black">Title</label>
                            <input type="text" name="title"
                                class="w-full p-2.5 text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                value="{{ $announcementDetails->title }}">
                        </div>

                        <div>
                            <label for="default-input" class="block text-sm font-medium text-black">Start Date
                            </label>
                            <div class="relative max-w-sm mt-1">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" id="start_date" name="start_date"
                                    class="outline-1 outline text-black text-sm rounded-lg block w-full pl-10 p-2.5 "
                                    placeholder="Select date" onkeydown="return false"
                                    value="{{ $announcementDetails->start_date }}" autocomplete="off">
                            </div>
                        </div>

                        <div>
                            <label for="default-input" class="block text-sm font-medium text-black">End Date
                            </label>
                            <div class="relative max-w-sm mt-1">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" id="end_date" name="end_date"
                                    class="outline-1 outline text-black text-sm rounded-lg block w-full pl-10 p-2.5"
                                    placeholder="Select date" onkeydown="return false"
                                    value="{{ $announcementDetails->end_date }}" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-4 bg-white">
                        <div class="w-full">
                            <label for="content" class="block mb-2 text-sm font-medium text-black ">Content</label>
                            <textarea id="content" rows="4" name="content"
                                class="block w-full pb-10 text-sm text-black bg-white rounded-lg resize-none outline outline-1"
                                placeholder="Write your content here...">{{ $announcementDetails->content }}</textarea>
                        </div>
                    </div>

                    <div class="bg-white">
                        <div class="mx-5 mb-2 text-sm font-semibold text-gray-900">
                            Image/s
                        </div>
                        @include('components.edit-announcement-images')
                    </div>

                    <div class="px-5 pt-5 pb-4 bg-white">
                        <div class="w-full">

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="image-inputt">Upload Image/s</label>
                            <input
                                class="block w-full text-black bg-white border-2 border-black rounded-lg cursor-pointer text-md"
                                id="image-input" name="images[]" type="file" multiple accept=".jpeg, .jpg"
                                onchange="preview()">
                            <p class="mt-2 text-center" id="number-of-image">No Preview</p>
                            <div class="relative flex flex-wrap mx-[-10px] mt-2 w-96 md:mx-auto justify-evenly"
                                id="images">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center py-3 text-right bg-gray-200 rounded-b-lg">
                        <button type="submit"
                            class="w-full py-2 text-white bg-blue-600 rounded hover:bg-blue-700 hover:duration-300">
                            <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                                        clip-rule="evenodd" />
                                </svg>
                                &nbsp; Update Announcement
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
