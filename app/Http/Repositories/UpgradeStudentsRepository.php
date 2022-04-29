<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UpgradeStudentsInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\UpgradeStudentsTraits;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\UpgradeStudent;
use Exception;
use Illuminate\Support\Facades\DB;

class UpgradeStudentsRepository implements UpgradeStudentsInterface
{

    private $upgradeStudentModel;
    private $studentModel;
    private $gradesModel;
    use UpgradeStudentsTraits;
    use GradesTraits;

    public function __construct(UpgradeStudent $upgradeStudent, Student $student, Grade $grades)
    {
        $this->upgradeStudentModel = $upgradeStudent;
        $this->studentModel = $student;
        $this->gradesModel = $grades;
    }


    public function index()
    {
        $grades = $this->getAllGrades();
        return view('Students.upgraded', compact('grades'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {
            //first we go to the students table and get the info we needed to change from that table 
            $students = $this->studentModel::where([['grade_id', $request->grade_id],['class_id', $request->class_id],['section_id', $request->section_id]])->get();
            if($students->count() < 1)
            return redirect()->back()->with('error_promotions', trans('messages.There are no students found'));
            //now we need to enter the new data in the student table and coz it may be more the one student we need to make for each for each student
            foreach($students as $student) {
                $studentIds = explode(',', $student->id);
                $this->studentModel::whereIn('id', $studentIds)//will compare every index in the array while where will compare with just first value of the array
                ->update([
                    'grade_id' => $request->new_grade_id,
                    'class_id' => $request->new_class_id,
                    'section_id' => $request->new_section_id
                ]);

                $this->upgradeStudentModel::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade_id,
                    'from_class' => $request->class_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->new_grade_id,
                    'to_class' => $request->new_class_id,
                    'to_section' => $request->new_section_id,
                ]);
            }

             DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('upgradedStudents.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function update($request)
    {
        try {


            toastr()->success(trans('messages.update'));
            return redirect(route('upgradedStudents.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        toastr()->error(trans('messages.delete'));
        return redirect(route('upgradedStudents.index'));
    }
}
