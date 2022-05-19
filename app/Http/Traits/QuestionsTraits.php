<?php
namespace App\Http\Traits;

trait QuestionsTraits {
    public function getAllQuestions()
    {
        return $this->questionModel::get();
    }

    public function getQuestionById($questionId)
    {
        return $this->questionModel::findOrFail($questionId);
    }

}
