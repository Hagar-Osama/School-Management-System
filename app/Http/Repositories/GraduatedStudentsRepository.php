<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\GraduatedStudentsInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Grade;
use App\Models\Student;
use App\Models\UpgradeStudent;
use Exception;
use Illuminate\Support\Facades\DB;

class GraduatedStudentsRepository implements GraduatedStudentsInterface
{

    private $studentModel;
    private $gradesModel;
    use GradesTraits;
    use StudentsTraits;

    public function __construct(Student $student, Grade $grades)
    {
        $this->studentModel = $student;
        $this->gradesModel = $grades;
    }


    public function index()
    {
        $students = $this->studentModel->onlyTrashed()->get();
        return view('Students.GraduatedStudents.index', compact('students'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        return view('Students.GraduatedStudents.create', compact('grades'));
    }

    public function graduateStudent($request)
    {
        //first we go to the students table and get the info we needed to change from that table 
        $students = $this->studentModel::where([['grade_id', $request->grade_id], ['class_id', $request->class_id], ['section_id', $request->section_id]])->get();
        if ($students->count() < 1) {
            return redirect()->back()->with('error_Graduated', trans('messages.There are no students found'));
        }
        //now we will graduate all students by soft deleteing them

        foreach ($students as $student) {
            $studentsIds = explode(',', $student->id);
            $this->studentModel::whereIn('id', $studentsIds)->delete();   
        }
        toastr()->error(trans('messages.delete'));
        return redirect(route('graduatedStudents.index'));
    }

    public function UnarchiveStudent($request)
    {
        $this->studentModel::withTrashed()->where('id', $request->student_id)->restore();
        toastr()->success(trans('messages.success'));
        return redirect(route('students.index'));
    }

    public function destroy($request)
    {
        $this->studentModel::withTrashed()->where('id', $request->student_id)->forceDelete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('graduatedStudents.index'));
    }
}
