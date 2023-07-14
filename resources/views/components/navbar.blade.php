<nav class="text-white bg-gray-900 border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="{{ route('user-index') }}" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                    clip-rule="evenodd" />
            </svg> &nbsp; &nbsp;
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                TASKS
            </span>
        </a>
        <div class="flex items-center justify-between">
            {{-- * MODAL TOGGLE * --}}
            <button
                class="flex py-2 pl-3 pr-4 text-white md:hidden md:hover:bg-transparent md:border-0 hover:text-blue-600 hover:duration-300 md:p-0"
                onclick="toggleModal()">
                Add &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <button data-collapse-toggle="mega-menu-icons" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                <li>
                    {{-- * MODAL TOGGLE * --}}
                    <button
                        class="hidden py-2 pl-3 pr-4 text-white border-b border-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-600 hover:duration-300 md:p-0 md:flex"
                        onclick="addToggleModal()">
                        Add &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white border-b border-gray-100 md:hover:bg-transparent md:border-0 hover:text-blue-600 hover:duration-300 md:p-0"
                        aria-current="page">PDF</a>
                </li>
                <li>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center md:p-0 justify-between w-full pl-3 pr-4 border-b md:border-none md:w-auto text-md hover:text-blue-600 hover:duration-300"
                        type="button">Excel
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden w-20 bg-gray-900 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                        <ul class="py-2 text-sm text-center text-white" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="" class="block px-4 py-2 hover:text-blue-600 hover:duration-300">
                                    Import
                                </a>
                            </li>
                            <li>
                                <a href="" class="block px-4 py-2 hover:text-blue-600 hover:duration-300">
                                    Export
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown2"
                        class="text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center md:p-0 justify-between w-full pl-3 pr-4 border-b md:border-none md:w-auto hover:text-blue-600 hover:duration-300"
                        type="button">{{ $userEmail['email_address'] }} <svg class="w-2.5 h-2.5 ml-2.5"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    {{-- * DROPDOWN MENU * --}}
                    <div id="dropdown2"
                        class="z-10 hidden w-24 text-center bg-gray-900 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                        <ul class="py-2 text-sm text-white" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('user-logout') }}"
                                    class="block px-4 py-2 hover:text-blue-600 hover:duration-300">
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
