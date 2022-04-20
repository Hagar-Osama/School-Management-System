<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentsInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Blood;
use App\Models\Classes;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Exception;

class StudentsRepository implements StudentsInterface
{
    private $studentModel;
    private $parentModel;
    private $genderModel;
    private $bloodModel;
    private $nationalityModel;
    private $gradesModel;
    private $sectionModel;
    private $classModel;
    use StudentsTraits;
    use GradesTraits;

    public function __construct(Student $student, myParent $parent, Gender $gender, Blood $blood, Nationality $nationality, Grade $grade, Section $section, Classes $class)
    {
        $this->studentModel = $student;
        $this->parentModel = $parent;
        $this->genderModel = $gender;
        $this->bloodModel = $blood;
        $this->nationalityModel = $nationality;
        $this->gradesModel = $grade;
        $this->sectionModel = $section;
        $this->classModel = $class;
    }

    public function index()
    {
        $students = $this->getAllStudents();
        return view('Students.students', compact('students'));
    }

    public function getClasses($gradeId)
    {
        //when i choose the grades i want to get the classes belongs to this grade
        $classes = $this->classModel::where('grade_id', $gradeId)->pluck('name', 'id');
        return json_encode($classes);
    }

    public function getSections($classId)
    {
        //when i choose the classes i want to get the sections belongs to this class

        $sections = $this->sectionModel::where('class_id', $classId)->pluck('name', 'id');
        return json_encode($sections);
    }

    public function create()
    {
        $data['parents'] = $this->parentModel::get();
        $data['bloods'] = $this->bloodModel::get();
        $data['genders'] = $this->genderModel::get();
        $data['grades'] = $this->getAllGrades();
        $data['nationalities'] = $this->nationalityModel::get();
        return view('Students.create', $data);
    }

    public function store($request)
    {

        try {

            toastr()->success(trans('messages.success'));
            return redirect(route('students.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        return view('Students.edit');
    }

    public function update($request)
    {
        try {


            toastr()->success(trans('messages.update'));
            return redirect(route('students.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {

        toastr()->error(trans('messages.delete'));
        return redirect(route('grades.index'));
    }
}
