<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Mail\StudentVerificationCodeMail;
use App\Http\Requests\StudentLoginRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Http\Requests\StudentInformationRequest;
use App\Http\Requests\UpdateStudentInformationRequest;

class StudentController extends Controller
{
    public function check(StudentLoginRequest $request, Student $student)
    {
        $requests = $request->validated();

        $students = $student->where('email_address', $requests['email_address'])->first();

        if (!$students) {
            return back()->with("error", "The user is not reflected in our database");
        }

        if (!Hash::check($requests['password'], $students->password)) {
            return back()->with("error", "The password does not match");
        }

        if ($students->verification_token === null) {
            $request->session()->put('studentEmail', $students->id);
            return redirect()->route('student-index');
        }

        $mailData = [
            'title' => 'Verification Code',
            'body' => $students->verification_token
        ];

        Mail::to($students->email_address)->send(new StudentVerificationCodeMail($mailData));

        $temporaryVerificationCodeView = URL::temporarySignedRoute('verify-code', now()->addMinute(1), ['email_address' => $students->email_address]);

        return redirect($temporaryVerificationCodeView);
    }

    public function verifiedStudent(Request $request, Student $student)
    {
        $validated = $request->validate([
            'verification_token' => 'required|max:12|min:12'
        ]);

        $students = $student->where('verification_token', $validated['verification_token'])->first();

        if (!$students) {
            return back()->with("error", "Incorrect Code");
        }

        $students->email_verified_at = Carbon::today()->format('Y-m-d');
        $students->save();

        $students->update(['verification_token' => null]);

        $request->session()->put('studentEmail', $students->id);

        return to_route('student-index');
    }

    public function logout()
    {
        if (session()->has('studentEmail')) {
            session()->pull('studentEmail');

            return to_route('student-login');
        }
    }

    public function index(Student $student, Announcement $announcement, Image $image)
    {
        $studentEmail = ['studentEmail' => $student->where('id', session('studentEmail'))->first()];

        // * GET CURRENT DATE IN THE FORMAT 'Y-M-D' * //
        $currentDate = Carbon::today()->format('Y-m-d');

        // * RETRIEVE ANNOUNCEMENTS THAT ARE CURRENTLY ACTIVE (BETWEEN START_DATE AND END_DATE) WITH THEIR IMAGES * //
        $activeAnnouncements = $announcement
            ->whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->with('images')
            ->get();

        return view('student.index', $studentEmail, compact('activeAnnouncements'));
    }

    // * =========================================================================== * //
    // * =========================================================================== * //
    // * =========================================================================== * //

    // * FUNCTIONS FOR ADMIN SIDE * //
    public function students(User $user, Student $student)
    {
        $userId = session('userEmail');

        $userEmail = ['userEmail' => $user->where('id', $userId)->first()];

        // * ASSUMING 'USER_ID' IS THE COLUMN NAME THAT RELATES TO THE USER IN THE STUDENT MODEL * //
        $students = $student->where('user_id', $userId)->with('users')->orderBy('id', 'ASC')->get();

        return view('user.students', $userEmail, compact('students'));
    }

    public function create(User $user)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];

        return view('components.add-student', $userEmail);
    }


    public function store(StudentInformationRequest $request, Student $student)
    {
        $requests = $request->validated();

        // * GET THE MAXIMUM EXISTING STUDENT NUMBER FROM THE DATABASE * //
        $maxStudentNumber = $student->max('student_no');

        // * EXTRACT THE COUNTER PART AND INCREMENT IT FOR THE NEXT STUDENT NUMBER * //
        if ($maxStudentNumber === null) {
            $counter = 1;
        } else {
            $counter = (int) explode('-', $maxStudentNumber)[1] + 1;
        }

        // * GENERATE THE STUDENT NUMBER IN THE FORMAT '2023-00001' IF NOT PROVIDED IN THE REQUEST * //
        if (!isset($requests['student_no'])) {
            $studentNumber = '2023-' . str_pad($counter, 5, '0', STR_PAD_LEFT);
        }
        $requests['student_no'] = $studentNumber;

        $requests['password'] = Hash::make(strtolower($requests['lastname']));

        $requests['verification_token'] = Str::random(12);

        $save = $student->create($requests);

        if (!$save) {
            return redirect()->with("error", "Saving Failed");
        }

        return redirect()->route('user-index')->with("success", "Saved Successfully");
    }


    public function edit(Student $student, User $user, $id)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $studentDetails = $student->findOrFail($id);

        return view('components.edit-student', $userEmail, compact('studentDetails'));
    }

    public function update(UpdateStudentInformationRequest $request, Student $student, $id)
    {
        $requests = $request->validated();

        // * FIND THE STUDENT BY ITS ID * //
        $update_student = $student->findOrFail($id);

        // * CHECK IF THE FIRST NAME, MIDDLE NAME, OR LAST NAME HAS CHANGED * //
        $firstNameChanged = $requests['firstname'] !== $update_student->firstname;
        $middleNameChanged = $requests['middlename'] !== $update_student->middlename;
        $lastNameChanged = $requests['lastname'] !== $update_student->lastname;

        // * CHECK IF A NEW IMAGE IS ABOUT TO UPLOAD * //
        if ($request->hasFile('image')) {
            // * IF A NEW IMAGE IS UPLOADED, HANDLE IT HERE * //
            if ($update_student->image) {
                // ! DELETE THE OLD IMAGE FROM THE PUBLIC/IMAGES DIRECTORY ! //
                Storage::delete('images/' . $update_student->image);
            }

            // * GENERATE THE NEW IMAGE NAME USING THE NEW FIRST NAME, MIDDLE NAME, AND LAST NAME * //
            $imageName = "{$requests['firstname']}_{$requests['middlename']}_{$requests['lastname']}" . '.' . $request->image->getClientOriginalExtension();

            // * MOVE THE NEW IMAGE TO THE IMAGES DIRECTORY * //
            $request->image->move(public_path('images'), $imageName);

            // * UPDATE THE NEW IMAGE NAME IN THE REQUESTS ARRAY * //
            $requests['image'] = $imageName;

        } elseif ($firstNameChanged || $middleNameChanged || $lastNameChanged) {
            // * IF THE NAMES HAVE CHANGED BUT NO NEW IMAGE UPLOADED, HANDLE RENAMING OF THE EXISTING IMAGE HERE * //

            // * GENERATE THE NEW IMAGE NAME USING THE UPDATED FIRST NAME, MIDDLE NAME, AND LAST NAME * //
            $newImageName = "{$requests['firstname']}_{$requests['middlename']}_{$requests['lastname']}" . '.' . pathinfo($update_student->image, PATHINFO_EXTENSION);

            // ! RENAME THE IMAGE FILE ! //
            $oldImagePath = public_path('images/' . $update_student->image);
            $newImagePath = public_path('images/' . $newImageName);
            rename($oldImagePath, $newImagePath);

            // * UPDATE THE NEW IMAGE NAME IN THE REQUESTS ARRAY * //
            $requests['image'] = $newImageName;
        }

        // * UPDATE THE STUDENT'S RECORD IN THE DATABASE WITH THE NEW INFORMATION, INCLUDING THE UPDATED IMAGE NAME IF PROVIDED. * //
        $update_student->update($requests);

        return to_route('student-list')->with("success", "Update Successfull");
    }

    public function destroy(Student $student, $id)
    {
        $student->findOrFail($id)->delete();

        return to_route('student-list')->with("success", "Delete Successful!");
    }

    public function downloadPDF(Student $student)
    {
        $userId = session('userEmail');
        $students = $student->where('user_id', $userId)->get();

        $pdfDownload = FacadePdf::loadView('components.pdf-table-export', array('students' => $students))->setOption(['defaultFont' => 'sans-serif'])->setPaper('legal', 'landscape');

        return $pdfDownload->download('all_students.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new StudentsExport, 'all_students.xlsx');
    }

    public function importExcel(Request $request)
    {
        $request->validate(['students' => 'required']);

        try {
            Excel::import(new StudentsImport, $request->file('students'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return back()->with("failures", $failures);
        }

        return to_route('student-list')->with("success", "Import Successful!");
    }
}
