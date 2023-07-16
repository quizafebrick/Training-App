@extends('components.layouts')

@section('edit-student')
    <div>
        @include('components.navbar')
        @include('components.add-modal-view')
    </div>

    <div class="flex items-center justify-center">
        <div class="mx-5 mt-5 mb-5 bg-gray-200 rounded-lg shadow-xl">
            <form action="{{ route('student-update', $studentDetails->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="inline-block mx-5 mt-5 mb-5 text-left transition-all transform bg-whiteshadow-xl w-fit align-center sm:align-center"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="pt-5 text-2xl font-bold text-center text-black underline bg-white rounded-t-lg">
                        Update Student Information
                    </div>
                    <div class="grid grid-cols-2 px-5 pt-5 bg-white gap-x-3 gap-y-3">
                        <div class="">
                            <label for="firstname" class="block mb-2 text-sm font-medium text-black">First
                                Name</label>
                            <input type="text" name="firstname"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                onkeyup="this.value = this.value.toUpperCase()" value="{{ $studentDetails->firstname }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('firstname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="middlename" class="block mb-2 text-sm font-medium text-black">Middle
                                Name</label>
                            <input type="text" name="middlename"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                onkeyup="this.value = this.value.toUpperCase()" value="{{ $studentDetails->middlename }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('middlename')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="lastname" class="block mb-2 text-sm font-medium text-black">Last
                                Name</label>
                            <input type="text" name="lastname"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                onkeyup="this.value = this.value.toUpperCase()" value="{{ $studentDetails->lastname }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('lastname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="gender" class="block mb-2 text-sm font-medium text-black">Gender </label>
                            <input type="text" name="gender"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                onkeyup="this.value = this.value.toUpperCase()" value="{{ $studentDetails->gender }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="contact_no" class="block text-sm font-medium text-black">Contact No. </label>
                            <input type="text" name="contact_no"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                onkeypress="return (event.charCode > 47 &&
                            event.charCode < 58)"
                                value="{{ $studentDetails->contact_no }}" minlength="11" maxlength="11">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('contact_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="email_address" class="block text-sm font-medium text-black">Email
                                Address</label>
                            <input type="email" name="email_address"
                                class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                value="{{ $studentDetails->email_address }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('email_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="">
                            <label for="default-input" class="block text-sm font-medium text-black">Birthday
                            </label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input type="text" id="editBirthday" name="birthday"
                                    class="outline-1 outline text-black text-sm rounded-lg block w-full pl-10 p-2.5 "
                                    placeholder="Select date" value="{{ $studentDetails->birthday }}">
                                <span class="py-2 text-sm font-medium text-red-500">
                                    @error('birthday')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="">
                            <label for="default-input" class="block text-sm font-medium text-black">Age</label>
                            <input type="text" id="age2" aria-label="disabled input"
                                class="mb-6 outline outline-1 bg-gray-200 text-black text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                readonly placeholder="{{ $studentDetails->age }}">
                            <input type="hidden" id="age3" name="age" value="{{ $studentDetails->age }}">
                        </div>
                    </div>

                    <div class="px-5 pt-5 pb-4 bg-white">
                        <div class="w-full">
                            <label for="message" class="block text-sm font-medium text-black ">Address</label>
                            <textarea id="message" rows="4" name="address"
                                class="block p-2.5 w-full text-sm text-black bg-white outline outline-1 rounded-lg resize-none"
                                placeholder="Write your Address here..." onkeyup="this.value = this.value.toUpperCase()">{{ $studentDetails->address }}</textarea>
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center px-4 py-3 text-right bg-gray-200 rounded-b-lg">
                        <button type="submit"
                            class="w-full px-4 py-2 mr-2 text-white bg-blue-500 rounded hover:bg-blue-700 hover:duration-300">
                            <div class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg> &nbsp;
                                Update Student Information
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection