@extends('components.layouts')

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin: auto;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #111827;
        color: white;
        text-align: center;
    }
</style>

@section('pdf-download-view')
    <div class="pb-3 font-bold text-center underline">
        <u>ALL STUDENTS</u>
    </div>

    <table id="customers">
        <tr>
            <th>No.</th>
            <th>Student No.</th>
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
        @foreach ($students as $student)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->student_no }}</td>
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
    </table>
@endsection
