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
        $upgrades = $this->getAllUpgradedStudents();
        return view('Students.UpgradedStudents.index', compact('upgrades'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        return view('Students.UpgradedStudents.create', compact('grades'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {
            //first we go to the students table and get the info we needed to change from that table 
            $students = $this->studentModel::where([['grade_id', $request->grade_id], ['class_id', $request->class_id], ['section_id', $request->section_id], ['academic_year', $request->academic_year]])->get();
            if ($students->count() < 1)
                return redirect()->back()->with('error_promotions', trans('messages.There are no students found'));
            //now we need to enter the new data in the student table and coz it may be more the one student we need to make for each for each student
            foreach ($students as $student) {
                $studentIds = explode(',', $student->id);
                $this->studentModel::whereIn('id', $studentIds) //will compare every index in the array while where will compare with just first value of the array
                    ->update([
                        'grade_id' => $request->new_grade_id,
                        'class_id' => $request->new_class_id,
                        'section_id' => $request->new_section_id,
                        'academic_year' => $request->new_academic_year
                    ]);

                $this->upgradeStudentModel::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade_id,
                    'from_class' => $request->class_id,
                    'from_section' => $request->section_id,
                    'to_grade' => $request->new_grade_id,
                    'to_class' => $request->new_class_id,
                    'to_section' => $request->new_section_id,
                    'academic_year' => $request->academic_year,
                    'new_academic_year' => $request->new_academic_year
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


    public function undoChanges($request)
    {
        DB::beginTransaction();
        try {
            if ($request->undo_upgrade == 'all') {
                $upgradedStudents = $this->getAllUpgradedStudents();
                foreach ($upgradedStudents as $upgradedStudent) {
                    $upgradedStudentsIds = explode(',', $upgradedStudent->student_id);
                    $this->studentModel::whereIn('id', $upgradedStudentsIds) //will compare every index in the array while where will compare with just first value of the array
                        ->update([
                            'grade_id' => $upgradedStudent->from_grade,
                            'class_id' => $upgradedStudent->from_class,
                            'section_id' => $upgradedStudent->from_section,
                            'academic_year' => $upgradedStudent->academic_year
                        ]);
                }
                $this->upgradeStudentModel::truncate();
                DB::commit();
                return redirect()->back();
                toastr()->error(trans('messages.delete'));
                return redirect(route('upgradedStudents.index'));
            } else {
                $upgradedStudent = $this->GetUpgradedStudentById($request->upgrade_id);
               $this->studentModel::where('id', $upgradedStudent->student_id)
                ->update([
                    'grade_id' => $upgradedStudent->from_grade,
                    'class_id' => $upgradedStudent->from_class,
                    'section_id' => $upgradedStudent->from_section,
                    'academic_year' => $upgradedStudent->academic_year
                ]);
                $upgradedStudent->delete();
                DB::commit();
                return redirect()->back();
                toastr()->error(trans('messages.delete'));
                return redirect(route('upgradedStudents.index'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $upgradedStudent = $this->GetUpgradedStudentById($request->upgrade_id);
        $upgradedStudent->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('upgradedStudents.index'));
    }

}
