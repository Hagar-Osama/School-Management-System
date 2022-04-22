<?php
namespace App\Http\Traits;

trait StudentsTraits {
    public function getAllStudents()
    {
        return $this->studentModel::get();
    }

    public function GetStudentById($studentId)
    {
        return $this->studentModel::findOrFail($studentId);
    }

}
