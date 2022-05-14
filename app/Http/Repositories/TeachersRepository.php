<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TeachersInterface;
use App\Http\Traits\TeachersTraits;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeachersRepository implements TeachersInterface
{
    private $teacherModel;
    private $genderModel;
    private $specModel;
    use TeachersTraits;


    public function __construct(Teacher $teacher, Gender $gender, Specialization $spec)
    {
        $this->teacherModel = $teacher;
        $this->genderModel = $gender;
        $this->specModel = $spec;
    }

    public function index()
    {
        $teachers = $this->teacherModel::with(['gender', 'specialization'])->get();
        return view('Teachers.teachers', compact('teachers'));
    }

    public function create()
    {
        $genders = $this->genderModel::get();
        $specializations = $this->specModel::get();
        return view('Teachers.create', compact('genders', 'specializations'));
    }

    public function store($request)
    {

        try {
            $teachers = new Teacher();
            $teachers->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $teachers->email = $request->email;
            $teachers->password = Hash::make($request->password);
            $teachers->address = $request->address;
            $teachers->gender_id = $request->gender_id;
            $teachers->specialization_id = $request->specialization_id;
            $teachers->hiring_date = $request->hiring_date;

            $teachers->save();

            toastr()->success(trans('messages.success'));
            return redirect(route('teachers.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($teacher_id)
    {
        $teacher = $this->getTeacherById($teacher_id);
        $genders = $this->genderModel::get();
        $specializations = $this->specModel::get();
        return view('Teachers.edit', compact('genders', 'specializations', 'teacher'));
    }

    public function update($request)
    {
        try {
            $teacher = $this->getTeacherById($request->teacher_id);
                $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                $teacher->email = $request->email;
                $teacher->password = Hash::make($request->password);
                $teacher->address = $request->address;
                $teacher->gender_id = $request->gender_id;
                $teacher->specialization_id = $request->specialization_id;
                $teacher->hiring_date = $request->hiring_date;

            $teacher->save();
            toastr()->success(trans('messages.update'));
            return redirect(route('teachers.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $teacher = $this->getTeacherById($request->teacher_id);
        $teacher->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('teachers.index'));
    }
}
