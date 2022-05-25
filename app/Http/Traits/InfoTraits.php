<?php
namespace App\Http\Traits;

trait InfoTraits {
    public function getAllInfo()
    {
        return $this->infoModel::get();
    }

    public function getInfoById($infoId)
    {
        return $this->infoModel::findOrFail($infoId);
    }

}
