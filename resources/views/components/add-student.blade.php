@extends('components.layouts')

@section('add-student')
    <div>
        @include('components.admin-navbar')
        {{-- @include('components.admin-tabs') --}}
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-400 border-dashed rounded-lg mt-14">
            <div class="mt-5 text-4xl font-bold text-center text-black underline">
                Student/Add
            </div>
            <div class="flex items-center justify-center">
                <div class="mx-5 mt-5 mb-5 bg-gray-200 rounded-lg shadow-xl">
                    <form action="{{ route('student-info-save') }}" method="POST">
                        @csrf
                        <div class="inline-block mx-5 mt-5 mb-5 text-left transition-all transform bg-whiteshadow-xl w-fit align-center sm:align-center"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <div class="pt-5 text-2xl font-bold text-center text-black bg-white rounded-t-lg">
                                <div class="underline">
                                    Student
                                </div>
                                <div class="w-full">
                                    {{-- ! ERROR MESSAGE ! --}}
                                    @include('components.error-message')
                                </div>
                            </div>
                            <div class="grid grid-cols-2 px-5 pt-3 bg-white gap-x-3 gap-y-3">
                                <div>
                                    <label for="firstname" class="block mb-2 text-sm font-medium text-black">First
                                        Name</label>
                                    <input type="text" name="firstname"
                                        class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                        onkeypress="return (event.charCode > 64 &&
                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                        onkeyup="this.value = this.value.toUpperCase()" value="{{ old('firstname') }}">
                                </div>

                                <div>
                                    <label for="middlename" class="block mb-2 text-sm font-medium text-black">Middle
                                        Name</label>
                                    <input type="text" name="middlename"
                                        class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                        onkeypress="return (event.charCode > 64 &&
                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                        onkeyup="this.value = this.value.toUpperCase()" value="{{ old('middlename') }}">
                                </div>

                                <div>
                                    <label for="lastname" class="block mb-2 text-sm font-medium text-black">Last
                                        Name</label>
                                    <input type="text" name="lastname"
                                        class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                        onkeypress="return (event.charCode > 64 &&
                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                        onkeyup="this.value = this.value.toUpperCase()" value="{{ old('lastname') }}">
                                </div>

                                <div class="">
                                    <label for="gender" class="block mb-2 text-sm font-medium text-black">Gender </label>
                                    <select name="gender"
                                        class="w-full py-2 text-sm text-black rounded-lg outline outline-1"
                                        value="{{ old('gender') }}">
                                        <option selected disabled>Choose Gender:</option>
                                        <option value="Male" class="hover:bg-blue-600 hover:duration-300">Male</option>
                                        <option value="Female" class="hover:bg-blue-600 hover:duration-300">Female</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="contact_no" class="block text-sm font-medium text-black">Contact No.
                                    </label>
                                    <input type="text" name="contact_no"
                                        class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                        onkeypress="return (event.charCode > 47 &&
                                event.charCode < 58) || (event.charCode > 42 &&
                                event.charCode < 44)"
                                        value="{{ old('contact_no') }}">
                                </div>

                                <div>
                                    <label for="email_address" class="block text-sm font-medium text-black">Email
                                        Address</label>
                                    <input type="email" name="email_address"
                                        class="w-full text-sm text-black bg-white border border-gray-300 rounded-lg outline-1 outline"
                                        value="{{ old('email_address') }}">
                                </div>

                                <div>
                                    <label for="default-input" class="block text-sm font-medium text-black">Birthday
                                    </label>
                                    <div class="relative max-w-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="birthday" name="birthday"
                                            class="outline-1 outline text-black text-sm rounded-lg block w-full pl-10 p-2.5 "
                                            placeholder="Select date" onkeydown="return false" value="{{ old('birthday') }}"
                                            autocomplete="off">
                                    </div>
                                </div>

                                <div>
                                    <label for="default-input" class="block text-sm font-medium text-black">Age</label>
                                    <input type="text" id="age" name="age" aria-label="disabled input"
                                        class="mb-6 outline outline-1 bg-gray-200 text-black text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                        readonly value="{{ old('age') }}">
                                </div>
                            </div>

                            <div class="px-5 pt-5 pb-4 bg-white">
                                <div class="w-full">
                                    <label for="message" class="block mb-2 text-sm font-medium text-black ">Address</label>
                                    <textarea id="message" rows="4" name="address"
                                        class="block p-2.5 w-full text-sm text-black bg-white outline outline-1 rounded-lg resize-none"
                                        placeholder="Write your Address here..." onkeyup="this.value = this.value.toUpperCase()">{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{ $userEmail['id'] }}">

                            <div class="flex items-center justify-center px-4 py-3 text-right bg-gray-200 rounded-b-lg">
                                <button type="submit"
                                    class="w-full px-4 py-2 mr-2 text-white bg-blue-600 rounded hover:bg-blue-700 hover:duration-300">
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        &nbsp; Create Student
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
