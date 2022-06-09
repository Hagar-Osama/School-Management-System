<?php

namespace App\Http\Controllers\Dashboards\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddQuestionTeacherDashboardRequest;
use App\Http\Requests\DeleteQuestionRequest;
use App\Http\Requests\UpdateQuestionTeacherDashboardRequest;
use App\Http\Traits\OnlineExamsTraits;
use App\Http\Traits\QuestionsTraits;
use App\Models\OnlineExam;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class TeacherQuestionController extends Controller
{
    private $questionModel;
    private $onlineExamModel;
    use OnlineExamsTraits;
    use QuestionsTraits;



    public function __construct(Question $question, OnlineExam $onlineExam)
    {
        $this->questionModel = $question;
        $this->onlineExamModel = $onlineExam;
    }

    public function create($onlineExam_id)
    {
        $onlineExamId = $onlineExam_id;
        return view('Teachers.Dashboard.Questions.create', compact('onlineExamId'));
    }

    public function store(AddQuestionTeacherDashboardRequest $request)
    {

        try {
            $this->questionModel::create([
                'question' => $request->question,
                'answer' => $request->answer,
                'score' => $request->score,
                'right_answer' => $request->right_answer,
                'online_exam_id' => $request->onlineExamId

            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('questions.show', $request->onlineExamId));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($questionId)
    {
        $question = $this->getQuestionById($questionId);
        return view('Teachers.Dashboard.Questions.edit', compact('question'));
    }

    public function update(UpdateQuestionTeacherDashboardRequest $request)
    {
        try {
            $question = $this->getQuestionById($request->question_id);
            $question->update([
                'question' => $request->question,
                'answer' => $request->answer,
                'score' => $request->score,
                'right_answer' => $request->right_answer,

            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('questions.show', $question->online_exam_id));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(DeleteQuestionRequest $request)
    {
        $this->questionModel::destroy($request->question_id);
        toastr()->error(trans('messages.delete'));
        return redirect()->back();
    }
}
