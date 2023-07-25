<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentInformationRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, $id)
    {
        $studentEmail = ['studentEmail' => $student->where('id', session('studentEmail'))->first()];
        $studentDetails = $student->findOrFail($id);

        return view('student.profile', $studentEmail, compact('studentDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
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

        return to_route('student-profile-index', $id)->with("success", "Update Successful!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
