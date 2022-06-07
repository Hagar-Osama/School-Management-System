<?php

namespace App\Http\Controllers\Dashboards\Teachers;

use App\Http\Traits\GradesTraits;
use App\Http\Traits\OnlineExamsTraits;
use App\Http\Traits\SubjectsTraits;
use App\Http\Traits\TeachersTraits;
use App\Models\Grade;
use App\Models\OnlineExam;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddOnlineExamRequest;
use App\Http\Requests\AddQuizTeacherDashboardRequest;
use App\Http\Requests\DeleteOnlineExamRequest;
use App\Http\Requests\UpdateQuizTeacherDashboardRequest;
use App\Models\Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $subjectModel;
    private $onlineExamModel;
    private $gradesModel;
    private $classModel;
    private $sectionModel;
    use SubjectsTraits;
    use OnlineExamsTraits;
    use TeachersTraits;
    use GradesTraits;



    public function __construct(Subject $subjects, OnlineExam $onlineExam, Grade $grade, Classes $classes, Section $section)
    {
        $this->subjectModel = $subjects;
        $this->gradesModel = $grade;
        $this->onlineExamModel = $onlineExam;
        $this->classModel = $classes;
        $this->sectionModel = $section;
    }

    public function index()
    {
        $onlineExams = $this->onlineExamModel::where('teacher_id', auth()->user()->id)->get();
        return view('Teachers.Dashboard.OnlineExams.index', compact('onlineExams'));
    }

    public function create()
    {
        $data['subjects'] = $this->subjectModel::where('teacher_id', auth()->user()->id)->get();
        $data['grades'] = $this->getAllGrades();
        return view('Teachers.Dashboard.OnlineExams.create', $data);
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

    public function store(AddQuizTeacherDashboardRequest $request)
    {

        try {
            $this->onlineExamModel::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => auth()->user()->id,
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
        $data['subjects'] = $this->subjectModel::where('teacher_id', auth()->user()->id)->get();
        $data['grades'] = $this->getAllGrades();
        return view('Teachers.Dashboard.OnlineExams.edit', $data, compact('onlineExam'));
    }

    public function update(UpdateQuizTeacherDashboardRequest $request)
    {
        try {
            $onlineExam = $this->getOnlineExamById($request->onlineExam_id);
            $onlineExam->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'subject_id' => $request->subject_id,
                'teacher_id' => auth()->user()->id,
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


    public function destroy(DeleteOnlineExamRequest $request)
    {
        $onlineExam = $this->getOnlineExamById($request->onlineExam_id);
        $onlineExam->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('onlineExams.index'));
    }
}
