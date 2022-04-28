<?php
namespace App\Http\Traits;

trait UpgradeStudentsTraits {
    public function getAllUpgradedStudents()
    {
        return $this->upgradeStudentModel::get();
    }

    public function GetUpgradedStudentById($upgradedStudentId)
    {
        return $this->upgradeStudentModel::findOrFail($upgradedStudentId);
    }

}
