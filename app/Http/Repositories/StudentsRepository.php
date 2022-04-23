<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentsInterface;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Blood;
use App\Models\Classes;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    private $imageModel;
    use StudentsTraits;
    use GradesTraits;
    use FilesTraits;

    public function __construct(Student $student, myParent $parent, Gender $gender, Blood $blood, Nationality $nationality, Grade $grade, Section $section, Classes $class, Image $image)
    {
        $this->studentModel = $student;
        $this->parentModel = $parent;
        $this->genderModel = $gender;
        $this->bloodModel = $blood;
        $this->nationalityModel = $nationality;
        $this->gradesModel = $grade;
        $this->sectionModel = $section;
        $this->classModel = $class;
        $this->imageModel = $image;
    }

    public function index()
    {
        $students = $this->getAllStudents();
        return view('Students.students', compact('students'));
    }

    public function getClasses($gradeId)
    {
        //when i choose the grades in blade i want to get the classes belongs to this grade
        $classes = $this->classModel::where('grade_id', $gradeId)->pluck('name', 'id');
        return json_encode($classes);
    }

    public function getSections($classId)
    {
        //when i choose the classes in blade i want to get the sections belongs to this class

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
        DB::beginTransaction();
        try {
            $students = new Student();
            $students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->academic_year = $request->academic_year;
            $students->birth_date = $request->birth_date;
            $students->parent_id = $request->parent_id;
            $students->grade_id = $request->grade_id;
            $students->gender_id = $request->gender_id;
            $students->class_id = $request->class_id;
            $students->blood_id = $request->blood_id;
            $students->nationality_id = $request->nationality_id;
            $students->section_id = $request->section_id;

            $students->save();


            if ($request->hasFile('photos')) {
                $images = $request->file('photos');
                foreach ($images as $image) {
                    $imageName = $image->hashName();
                    // $image->storeAs('students/'.$students->name, time() . '_students.' .$image->extension(), 'public');
                    $this->uploadFile($image, 'students/' . $students->name, $imageName);
                    $this->imageModel::create([
                        'file_name' => $imageName,
                        'imageable_id' => $students->id,
                        'imageable_type' => Student::class,

                    ]);
                }
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('students.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($student_id)
    {
        $student = $this->GetStudentById($student_id);
        $data['parents'] = $this->parentModel::get();
        $data['bloods'] = $this->bloodModel::get();
        $data['genders'] = $this->genderModel::get();
        $data['grades'] = $this->getAllGrades();
        $data['nationalities'] = $this->nationalityModel::get();

        return view('Students.edit', $data, compact('student'));
    }

    public function update($request)
    {
        try {
            $student = $this->GetStudentById($request->student_id);
            $student->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->academic_year = $request->academic_year;
            $student->birth_date = $request->birth_date;
            $student->parent_id = $request->parent_id;
            $student->grade_id = $request->grade_id;
            $student->gender_id = $request->gender_id;
            $student->class_id = $request->class_id;
            $student->blood_id = $request->blood_id;
            $student->nationality_id = $request->nationality_id;
            $student->section_id = $request->section_id;

            $student->save();


            toastr()->success(trans('messages.update'));
            return redirect(route('students.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $student = $this->GetStudentById($request->student_id);
        $student->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('students.index'));
    }
}
