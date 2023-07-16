@extends('table-bootstrap.components.layouts')

@section('pdf-download-view')
    {{-- <div class="mt-6 text-5xl font-bold text-center text-black underline uppercase">
        All Students
    </div>
    <div class="flex items-center justify-center">
        <div class="p-4 mx-10 mt-10 mb-10 bg-gray-300 rounded-lg">
            <div class="p-6 bg-white rounded-lg">
                <table class="w-full font-bold text-center text-md outline outline-1">
                    <thead class="text-white bg-gray-900 divide-x divide-y divide-white rounded-lg">
                        <tr>
                            <th>No.</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Middlename</th>
                            <th>Contact No.</th>
                            <th>Gender</th>
                            <th>Email Address</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>Address</th>
                        </tr>
                    </thead>

                    <tbody class="p-3 text-black">
                        @foreach ($students as $student)
                            <tr class="text-center divide-x divide-y divide-black divide-solid">
                                <td class="border-b border-black">{{ $loop->iteration }}</td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->middlename }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>{{ $student->contact_no }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->email_address }}</td>
                                <td>{{ $student->birthday }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <div class="p-5 border-top">
        <div class="mb-3 text-center text-black text-underline fs-1 fw-semibold">
            ALL STUDENTS
        </div>
        <table class="table border-top-0 table-striped">
            <thead class="text-center text-white border-0">
                <tr>
                    <th>No.</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Middlename</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Email Address</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($students as $student)
                    <tr class="">
                        <td class="">{{ $loop->iteration }}</td>
                        <td>{{ $student->firstname }}</td>
                        <td>{{ $student->middlename }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->contact_no }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->email_address }}</td>
                        <td>{{ $student->birthday }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
