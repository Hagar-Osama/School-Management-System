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
        $onlineExams = $this->onlineExamModel::where([ ['grade_id', auth()->user()->grade_id], ['section_id', auth()->user()->section_id] ,['class_id', auth()->user()->class_id] ])
        ->orderBy('id','DESC')->get();
        return view('Students/Dashboard/OnlineExams.index', compact('onlineExams'));
    }

    public function show($onlineExamId)
    {

        // return view('Students/Dashboard/OnlineExams.show');
    }


}
