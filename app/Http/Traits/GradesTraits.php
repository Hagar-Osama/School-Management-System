<?php
namespace App\Http\Traits;

trait GradesTraits {
    public function getAllGrades()
    {
        return $this->gradesModel::get();
    }

    public function GetGradeById($gradeId)
    {
        return $this->gradesModel::find($gradeId);
    }

}
