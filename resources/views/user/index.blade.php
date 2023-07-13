@extends('components.layouts')

@section('user-index')
    <div>
        @include('components.navbar')
        @include('components.modal-view')
    </div>
    <div class="mt-5 text-4xl font-bold text-center text-black underline">Student's Information</div>
    <div class="p-3 mx-5 mt-10 bg-gray-300 rounded-lg shadow-lg md:mx-20 outline outline-0">
        <table id="studentTable" class="text-black bg-white nowrap display" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>MiddleName</th>
                    <th>Lastname</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Email Address</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->middlename }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->contact_no }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->email_address }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            {{-- * MODAL TOGGLE * --}}
                            {{-- <button
                                class="p-6 py-2 pl-3 pr-4 text-white bg-blue-600 border-b border-gray-100 rounded-md hover:duration-300 md:p-0 md:flex hover:bg-blue-700"
                                onclick="editToggleModal()"> --}}
                            <button
                                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm py-2.5 mr-2 mb-2 px-5"
                                onclick="editToggleModal()">

                                <div class="flex items-center justify-center">
                                    Edit &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4 text-white">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>
                                </div>
                            </button>
                        </td>
                        @include('components.edit-modal-view')

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
