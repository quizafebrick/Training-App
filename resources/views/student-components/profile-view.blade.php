<div class="mt-10">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="p-3 bg-blue-800 rounded-lg">
            <div class="my-3 text-3xl font-semibold text-center text-white">
                GENERAL INFORMATION
            </div>
            <div class="mt-5 bg-white">
                <div class="mx-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-5">
                            <div class="mb-6">
                                <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">
                                    Student No.
                                </label>
                                <input type="text" id="default-input"
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    value="{{ $studentDetails->student_no }}" disabled>
                            </div>
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Firstname
                                </label>
                                <input type="text" id="default-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ $studentDetails->firstname }}"
                                    onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                    onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Middlename
                                </label>
                                <input type="text" id="default-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"value="{{ $studentDetails->middlename }}"
                                    onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                    onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Lastname
                                </label>
                                <input type="text" id="default-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ $studentDetails->lastname }}"
                                    onkeypress="return (event.charCode > 64 &&
                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 44 && event.charCode < 46)"
                                    onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-end mb-6">
                                <div class="">
                                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white"
                                        for="file_input">
                                        Your Image
                                    </label>
                                    <img class="object-cover border-black border-1 w-52 h-52" id="image_output">
                                </div>
                            </div>

                            <div class="flex justify-end mb-6">

                                <input
                                    class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer w-80 bg-gray-50"
                                    id="image_input" name="image" accept=".jpg, .jpeg" type="file"
                                    onchange="imagePreview(event)">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-3 mt-5 bg-blue-800 rounded-lg">
            <div class="my-3 text-3xl font-semibold text-center text-white">
                PERSONAL INFORMATION
            </div>
            <div class="mt-5 bg-white">
                <div class="mx-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-5">
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Contact No.
                                </label>
                                <input type="text" id="default-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ $studentDetails->contact_no }}"
                                    onkeypress="return (event.charCode > 47 &&
                            event.charCode < 58)"
                                    value="{{ $studentDetails->contact_no }}" minlength="11" maxlength="13">
                            </div>
                            <div class="mb-6">
                                <label for="gender" class="block mb-2 text-sm font-medium text-black">Gender </label>
                                <select name="gender"
                                    class="w-full py-2 text-sm text-black rounded-lg outline outline-1">
                                    <option disabled>-- Currently Selected --</option>
                                    <option selected value="{{ $studentDetails->gender }}" class="text-gray-500">
                                        -- {{ $studentDetails->gender }} --
                                    </option>
                                    <option disabled>-- Select New Update --</option>
                                    <option value="Male" class="hover:bg-blue-600 hover:duration-300">Male</option>
                                    <option value="Female" class="hover:bg-blue-600 hover:duration-300">Female</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email Address
                                </label>
                                <input type="email" id="default-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ $studentDetails->email_address }}">
                            </div>
                        </div>

                        <div class="p-5">

                            <div class="mb-6">
                                <label for="default-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Birthday
                                </label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="editBirthday" name="birthday"
                                        class="outline-1 outline text-black text-sm rounded-lg block w-full pl-10 p-2.5 "
                                        placeholder="Select date" value="{{ $studentDetails->birthday }}"
                                        autocomplete="off" onkeydown="return false">
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="default-input" class="block text-sm font-medium text-black">Age</label>
                                <input type="text"
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                                    id="age2" placeholder="{{ $studentDetails->age }}" disabled>
                                <input type="hidden" id="age3" name="age"
                                    value="{{ $studentDetails->age }}">
                            </div>
                            <div class="mb-6">
                                <div class="w-full">
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-black ">Address</label>
                                    <textarea id="message" rows="4" name="address"
                                        class="block p-2.5 w-full text-sm text-black bg-white outline outline-1 rounded-lg resize-none"
                                        placeholder="Write your Address here..." onkeyup="this.value = this.value.toUpperCase()">{{ $studentDetails->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- * BUTTON * --}}
        <div class="mt-5">
            <button type="submit"
                class="w-full px-4 py-2 mr-2 text-white bg-blue-700 rounded hover:bg-blue-800 hover:duration-300">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                        <path
                            d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                    </svg> &nbsp;
                    Update Information
                </div>
            </button>
        </div>
    </form>
</div>
