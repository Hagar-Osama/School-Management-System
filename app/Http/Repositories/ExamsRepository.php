<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ExamsInterface;
use App\Http\Traits\ExamsTraits;
use App\Http\Traits\SubjectsTraits;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class ExamsRepository implements ExamsInterface
{
    private $subjectModel;
    private $examModel;
    use SubjectsTraits;
    use ExamsTraits;


    public function __construct(Subject $subjects, Exam $exam)
    {
        $this->subjectModel = $subjects;
        $this->examModel = $exam;
    }

    public function index()
    {
        $exams = $this->getAllExams();
        return view('Exams.index', compact('exams'));
    }

    public function create()
    {
        $subjects = $this->getAllSubjects();
        return view('Exams.create', compact('subjects'));
    }

    public function store($request)
    {

        try {
            $this->examModel::create([
                'semester' => ['en' => $request->semester_en, 'ar' => $request->semester_ar],
                'subject_id' => $request->subject_id,
                'academic_year' => $request->academic_year,
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('exams.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($examId)
    {
        $subjects = $this->getAllSubjects();
        $exam = $this->getExamById($examId);
        return view('exams.edit', compact('subjects', 'exam'));
    }

    public function update($request)
    {
        try {
            $exam = $this->getExamById($request->exam_id);
            $exam->update([
                'semester' => ['en' => $request->semester_en, 'ar' => $request->semester_ar],
                'subject_id' => $request->subject_id,
                'academic_year' => $request->academic_year,
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('exams.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $exam = $this->getExamById($request->exam_id);
        $exam->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('exams.index'));
    }
}
