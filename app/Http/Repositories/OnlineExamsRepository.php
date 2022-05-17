<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\OnlineExamsInterface;
use App\Http\Traits\ClassesTraits;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\OnlineExamsTraits;
use App\Http\Traits\SectionsTraits;
use App\Http\Traits\SubjectsTraits;
use App\Http\Traits\TeachersTraits;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\OnlineExam;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class OnlineExamsRepository implements OnlineExamsInterface
{
    private $subjectModel;
    private $onlineExamModel;
    private $gradesModel;
    private $classModel;
    private $sectionModel;
    private $teacherModel;
    use SubjectsTraits;
    use OnlineExamsTraits;
    use TeachersTraits;
    use GradesTraits;



    public function __construct(Subject $subjects, OnlineExam $onlineExam, Teacher $teacher, Grade $grade)
    {
        $this->subjectModel = $subjects;
        $this->teacherModel = $teacher;
        $this->gradesModel = $grade;
        $this->onlineExamModel = $onlineExam;
    }

    public function index()
    {
        $onlineExams = $this->getAllOnlineExams();
        return view('OnlineExams.index', compact('onlineExams'));
    }

    public function create()
    {
        $data['subjects'] = $this->getAllSubjects();
        $data['teachers'] = $this->getAllTeachers();
        $data['grades'] = $this->getAllGrades();
        return view('OnlineExams.create', $data);
    }

    public function store($request)
    {

        try {
            $this->onlineExamModel::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,


            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('onlineExams.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($onlineExamId)
    {
        $onlineExam = $this->getOnlineExamById($onlineExamId);
        $data['subjects'] = $this->getAllSubjects();
        $data['teachers'] = $this->getAllTeachers();
        $data['grades'] = $this->getAllGrades();
        return view('OnlineExams.edit', $data, compact('onlineExam'));
    }

    public function update($request)
    {
        try {
            $onlineExam = $this->getOnlineExamById($request->onlineExam_id);
            $onlineExam->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('onlineExams.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $onlineExam = $this->getOnlineExamById($request->onlineExam_id);
        $onlineExam->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('onlineExams.index'));
    }
}
