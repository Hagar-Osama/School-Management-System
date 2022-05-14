<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SubjectsInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\SubjectsTraits;
use App\Http\Traits\TeachersTraits;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class SubjectsRepository implements SubjectsInterface
{
    private $subjectModel;
    private $gradesModel;
    private $teacherModel;
    use SubjectsTraits;
    use GradesTraits;
    use TeachersTraits;

    public function __construct(Subject $subjects, Grade $grades, Teacher $teacher)
    {
        $this->subjectModel = $subjects;
        $this->gradesModel = $grades;
        $this->teacherModel = $teacher;
    }

    public function index()
    {
        $subjects = $this->getAllSubjects();
        return view('Subjects.index', compact('subjects'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        $teachers = $this->getAllTeachers();
        return view('Subjects.create', compact('grades', 'teachers'));
    }

    public function store($request)
    {

        try {
            $this->subjectModel::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->teacher_id
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('subjects.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($subject_id)
    {
        $subject = $this->getSubjectById($subject_id);
        $grades = $this->getAllGrades();
        $teachers = $this->getAllTeachers();
        return view('Subjects.edit', compact('subject', 'grades', 'teachers'));
    }

    public function update($request)
    {
        try {
            $subject = $this->getSubjectById($request->subject_id);
            $subject->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'teacher_id' => $request->teacher_id
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('subjects.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $subject = $this->getSubjectById($request->subject_id);
        $subject->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('subjects.index'));
    }
}
