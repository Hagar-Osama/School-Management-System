<?php
namespace App\Http\Traits;

trait SectionsTraits {
    public function getAllSections()
    {
        return $this->sectionModel::get();
    }

    public function GetSectionById($sectionId)
    {
        return $this->sectionModel::find($sectionId);
    }

}
