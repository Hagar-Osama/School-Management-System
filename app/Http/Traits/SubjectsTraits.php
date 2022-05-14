<?php
namespace App\Http\Traits;

trait SubjectsTraits {
    public function getAllSubjects()
    {
        return $this->subjectModel::get();
    }

    public function getSubjectById($subjectId)
    {
        return $this->subjectModel::findOrFail($subjectId);
    }

}
