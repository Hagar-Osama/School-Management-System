<?php
namespace App\Http\Traits;

trait TeachersTraits {
    public function getAllTeachers()
    {
        return $this->teacherModel::get();
    }

    public function getTeacherById($teacherId)
    {
        return $this->teacherModel::findOrFail($teacherId);
    }

}
