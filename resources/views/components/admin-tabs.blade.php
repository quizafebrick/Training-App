<div class="mx-5 mt-5 text-xs md:text-lg md:mx-20">
    <div class="border-b-2 border-black ">
        <nav class="flex">
            <a href="{{ route('user-index') }}"
                class="px-4 py-2 font-bold text-black hover:bg-gray-900 hover:duration-300 hover:rounded-t-lg hover:text-white hover:underline {{ request()->routeIs('user-index') ? 'bg-gray-900 rounded-t-lg text-white underline' : 'text-black' }}">
                Dashboard
            </a>
            <a href="{{ route('student-list') }}"
                class="px-4 py-2 font-bold text-black hover:bg-gray-900 hover:duration-300 hover:rounded-t-lg hover:text-white hover:underline {{ request()->routeIs('student-list') ? 'bg-gray-900 rounded-t-lg text-white underline' : 'text-black' }}">
                Students
            </a>
            <a
                class="px-4 py-2 font-bold text-black {{ request()->routeIs('student-add') ? 'bg-gray-900 rounded-t-lg text-white underline flex' : 'hidden' }}">
                Student/Add
            </a>
            <a
                class="px-4 py-2 font-bold text-black {{ request()->routeIs('student-edit') ? 'bg-gray-900 rounded-t-lg text-white underline flex' : 'hidden' }}">
                Student/Edit
            </a>
            <a href="{{ route('announcement-list') }}"
                class="px-4 py-2 font-bold text-black hover:underline hover:duration-300 hover:bg-gray-900 hover:rounded-t-lg hover:text-white {{ request()->routeIs('announcement-list') ? 'bg-gray-900 rounded-t-lg text-white underline' : 'text-black' }}">
                Announcements
            </a>
            <a
                class="px-4 py-2 font-bold text-black {{ request()->routeIs('announcement-add') ? 'bg-gray-900 rounded-t-lg text-white underline flex' : 'hidden' }}">
                Announcement/Add
            </a>
            <a
                class="px-4 py-2 font-bold text-black {{ request()->routeIs('announcement-edit') ? 'bg-gray-900 rounded-t-lg text-white underline flex' : 'hidden' }}">
                Announcement/Edit
            </a>
        </nav>
    </div>
</div>
