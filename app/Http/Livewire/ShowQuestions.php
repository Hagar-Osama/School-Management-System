<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Score;
use Livewire\Component;

class ShowQuestions extends Component
{
    public $onlineExamId;
    public $studentId;
    public $question;
    public $counter = 0; //the number of question رقم السؤال
    public $questionCount = 0; //the total number of the questions
    public function render()
    {
        //here when we click on the exam I need to get The questions that belong to that exam
        $this->question = Question::where('online_exam_id', $this->onlineExamId)->get();
        $this->questionCount = $this->question->count();
        return view('livewire.show-questions', ['question']);
    }

    public function nextQuestion($questionId, $score, $answer, $rightAnswer)
    {
        //first i need to check whether the student has previous scores or not
        $studentScores = Score::where([['student_id', $this->studentId], ['online_exam_id', $this->onlineExamId]])->first();
        //if the student has no scores then we will add his results in the scores table
        if ($studentScores == null) {
            $scores = new Score();
            $scores->student_id = $this->studentId;
            $scores->online_exam_id = $this->onlineExamId;
            $scores->question_id  = $questionId;
            //here we check wether the right answer is equivalent to the right answer in the question table
            if (strcmp(trim($answer), trim($rightAnswer)) === 0) {
                $scores->score += $score;
            } else {
                $scores->score += 0;
            }
            $scores->date = date('Y-m-d');
            $scores->save();
            //if there is previous score update the score table with the new exam results
        } else {

            if($studentScores->question_id >= $this->question[$this->counter]->id) {
                $studentScores->score = '0';
                $studentScores->manipulation = '1';
                $studentScores->save();
                toastr()->error('Exam canceled automatically for manipulation');
                return redirect()->route('studentsOnlineExams.index');

            }else {
                $studentScores->question_id  = $questionId;
                //here we check wether the right answer is equivalent to the right answer in the question table
                if (strcmp(trim($answer), trim($rightAnswer)) === 0) {
                    $studentScores->score += $score;
                } else {
                    $studentScores->score += 0;
                }
                $studentScores->save();

            }



        }

        if($this->counter < $this->questionCount - 1) {
            $this->counter++;

        }else {
            toastr()->success('Exam submitted successfully');
            return redirect()->route('studentsOnlineExams.index');
        }
    }

}
