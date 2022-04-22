<?php
namespace App\Http\Traits;

trait ClassesTraits {
    public function getAllClasses()
    {
        return $this->classModel::get();
    }

    public function GetClassById($classId)
    {
        return $this->classModel::findOrFail($classId);
    }

}
