<?php
namespace App\Http\Traits;

trait ExamsTraits {
    public function getAllExams()
    {
        return $this->examModel::get();
    }

    public function getExamById($examId)
    {
        return $this->examModel::findOrFail($examId);
    }

}
