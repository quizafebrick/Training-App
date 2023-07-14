<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditStudentModal extends ModalComponent
{
    public $studentID;

    public function mount($studentID)
    {
        $this->studentID = $studentID;

    }

    public function render()
    {
        $studentDetails = Student::where('id', $this->studentID)->first();
        // dd($studentDetails);
        return view('livewire.edit-student-modal', compact('studentDetails'));
    }
}
