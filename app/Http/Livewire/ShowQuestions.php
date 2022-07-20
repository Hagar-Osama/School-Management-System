<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class ShowQuestions extends Component
{
    public $onlineExamId;
    public $studentId;
    public $question;
    public $counter = 0; //the number of question رقم السؤال
    public function render()
    {
        //here when we click on the exam I need to get The questions that belong to that exam
        $this->question = Question::where('online_exam_id', $this->onlineExamId)->get();
        return view('livewire.show-questions', ['question']);
    }
}
