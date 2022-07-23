<?php

namespace App\Http\Controllers\Dashboards\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\StudentsTraits;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    private $studentModel;
    use StudentsTraits;


    public function __construct(Student $student)
    {
        $this->studentModel = $student;
     ;
    }
    public function index()
    {
        $information = $this->GetStudentById(auth()->user()->id);
        return view('Students.Dashboard.studentProfile', compact('information'));

    }


    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);
        $student = $this->GetStudentById($id);
        if(! empty($request->password)) {
            $student->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'password' => Hash::make($request->password)
            ]);
        }else {
            $student->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            ]);
        }
        toastr()->success(trans('messages.update'));
        return redirect()->back();


    }
}
