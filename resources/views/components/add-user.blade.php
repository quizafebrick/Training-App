<div class="flex flex-col items-center px-6 pt-5 mb-5">
    <div class="w-full bg-gray-300 rounded-lg shadow-lg md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-5 mx-3 my-3 bg-white rounded-lg">
            <div class="p-5 ">
                <form class="" action="{{ route('user-store') }}" method="POST">
                    @csrf
                    <div class="text-2xl font-bold text-center text-black bg-white rounded-t-lg">
                        <div class="underline">
                            Create User
                        </div>
                        <div class="w-full">
                            {{-- ! ERROR MESSAGE ! --}}
                            @include('components.error-message')
                        </div>
                    </div>
                    <div class="grid grid-cols-1 px-5 pt-3 pb-4 bg-white md:gap-x-3 gap-y-3">
                        <div>
                            <label for="email_address" class="block mb-2 text-sm font-medium text-gray-900">
                                Email Address
                            </label>
                            <input type="email" name="email_address"
                                class="bg-white border border-black text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5"
                                placeholder="name@company.com">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="bg-white border border-black text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5">
                        </div>
                        <div>
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                                password</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••"
                                class="bg-white border border-black text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5">
                        </div>
                        <div class="flex items-center justify-center pt-5">
                            <button type="submit"
                                class="w-full px-3 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 hover:duration-300">
                                <div class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    &nbsp; Create User
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
