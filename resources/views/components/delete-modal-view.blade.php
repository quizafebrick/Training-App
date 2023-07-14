{{-- <div id="delete-modal" class="fixed top-0 left-0 z-10 hidden w-full modal">
    <div class="w-full rounded-lg modal-content delete-modal-content">
        <span class="close">&times;</span>
        * DELETE CONFIRMATION CONTENT GOES HERE *
        <form action="" method="POST">
            @csrf
            @method('delete')
            <div class="mx-5">
                <div class="px-4 py-3 mx-10 text-center rounded-lg">
                    <div class="flex items-center justify-center">
                        <p class="mb-5 text-xl font-bold text-center text-black">
                            Are you sure you want to delete this student information?
                        </p>
                    </div>
                    <div class="flex items-center justify-center p-5 bg-gray-100 rounded-lg">
                        <div class="mb-5 font-semibold text-left text-black">
                            Full name: {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }},
                            <br>
                            Contact No.: {{ $student->contact_no }}, <br>
                            Email Address: {{ $student->email_address }}, <br>
                            Birthday: {{ $student->birthday }}, <br>
                            Age: {{ $student->age }}, <br>
                            Gender: {{ $student->gender }}, <br>
                            Address: {{ $student->address }}
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full p-5 bg-gray-100">
                        <button type="submit"
                            class="px-4 py-2 mr-2 text-white bg-red-600 rounded hover:bg-red-700 hover:duration-300">
                            <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                        clip-rule="evenodd" />
                                </svg>
                                &nbsp; Delete
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> --}}


{{-- <div class="fixed top-0 left-0 z-10 hidden w-full" id="delete-modal">
    <div
        class="flex items-center justify-center pt-4 pb-20 overflow-auto text-center md:px-4 min-height-100vh sm:block sm:p-0 ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
        </div>
        <form action="{{ route('student-info-save') }}" method="POST">
            @csrf
            <div class="flex items-center justify-center p-5 bg-gray-100 rounded-lg">
                <div class="mb-5 font-semibold text-left text-black">
                    Full name: {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }},
                    <br>
                    Contact No.: {{ $student->contact_no }}, <br>
                    Email Address: {{ $student->email_address }}, <br>
                    Birthday: {{ $student->birthday }}, <br>
                    Age: {{ $student->age }}, <br>
                    Gender: {{ $student->gender }}, <br>
                    Address: {{ $student->address }}
                </div>
            </div>
            <div class="flex items-center justify-center w-full p-5 bg-gray-100">
                <button type="submit"
                    class="px-4 py-2 mr-2 text-white bg-red-600 rounded hover:bg-red-700 hover:duration-300">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                clip-rule="evenodd" />
                        </svg>
                        &nbsp; Delete
                    </div>
                </button>
            </div>
        </form>
    </div>
</div> --}}



<div class="fixed top-0 left-0 z-10 hidden w-full" id="delete-modal">
    <div
        class="flex items-center justify-center pt-4 pb-20 overflow-auto text-center md:px-4 min-height-100vh sm:block sm:p-0 ">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
        </div>
        <form action="{{ route('student-info-save') }}" method="POST">
            @csrf
            <div class="inline-block mx-5 mt-5 mb-10 text-left transition-all transform bg-whiteshadow-xl w-fit align-center sm:align-center"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="px-10 mb-10 bg-white rounded-lg outline outline-1">
                    <div class="p-10 text-2xl font-bold text-center">
                        Are you sure you want to delete this student information?
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="px-10 mb-5 font-semibold text-left text-black bg-white text-md">
                            Full name: {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }},
                            <br>
                            Contact No.: {{ $student->contact_no }}, <br>
                            Email Address: {{ $student->email_address }}, <br>
                            Birthday: {{ $student->birthday }}, <br>
                            Age: {{ $student->age }}, <br>
                            Gender: {{ $student->gender }}, <br>
                            Address: {{ $student->address }}
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full p-5 mb-10 bg-gray-100">
                        <button type="submit"
                            class="px-4 py-2 mr-2 text-white bg-red-600 rounded hover:bg-red-700 hover:duration-300">
                            <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                        clip-rule="evenodd" />
                                </svg>
                                &nbsp; Delete
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- Edit form content goes here -->
        <h2>Edit Modal</h2>
        <!-- Form fields and buttons for editing -->
    </div>
</div> --}}
