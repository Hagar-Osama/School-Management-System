<?php

namespace App\Http\Controllers\Dashboards\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\OnlineExamsTraits;
use App\Models\OnlineExam;

use Exception;

class StudentExamController extends Controller
{
    private $onlineExamModel;
    use OnlineExamsTraits;




    public function __construct( OnlineExam $onlineExam)
    {

        $this->onlineExamModel = $onlineExam;
    }

    public function index()
    {
        //here I get the exam that belongs to the student who is using the website now
        $onlineExams = $this->onlineExamModel::where([ ['grade_id', auth()->user()->grade_id], ['section_id', auth()->user()->section_id] ,['class_id', auth()->user()->class_id] ])
        ->orderBy('id','DESC')->get();
        return view('Students/Dashboard/OnlineExams.index', compact('onlineExams'));
    }

    public function show($onlineExamId)
    {
        //when i click on show button it will get data from livewire not show blade
        $studentId = auth()->user()->id;
        return view('Students/Dashboard/OnlineExams.show', compact('studentId', 'onlineExamId'));
    }


}
