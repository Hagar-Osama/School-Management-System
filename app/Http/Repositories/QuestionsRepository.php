<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\QuestionsInterface;
use App\Http\Traits\OnlineExamsTraits;
use App\Http\Traits\QuestionsTraits;
use App\Models\OnlineExam;
use App\Models\Question;
use Exception;

class QuestionsRepository implements QuestionsInterface
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

    public function index()
    {
        $questions = $this->getAllQuestions();
        return view('Questions.index', compact('questions'));
    }

    public function create()
    {
        $onlineExams = $this->getAllOnlineExams();
        return view('Questions.create', compact('onlineExams'));
    }

    public function store($request)
    {

        try {
            $this->questionModel::create([
                'question' => $request->question,
                'answer' => $request->answer,
                'score' => $request->score,
                'right_answer' => $request->right_answer,
                'online_exam_id' => $request->online_exam_id

            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('questions.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($questionId)
    {
        $question = $this->getQuestionById($questionId);
        $onlineExams = $this->getAllOnlineExams();
        return view('Questions.edit', compact('question', 'onlineExams'));
    }

    public function update($request)
    {
        try {
            $question = $this->getQuestionById($request->question_id);
            $question->update([
                'question' => $request->question,
                'answer' => $request->answer,
                'score' => $request->score,
                'right_answer' => $request->right_answer,
                'online_exam_id' => $request->online_exam_id

            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('questions.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $this->questionModel::destroy($request->question_id);
        toastr()->error(trans('messages.delete'));
        return redirect(route('questions.index'));
    }
}
