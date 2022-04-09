<?php
namespace App\Http\Traits;

trait ParentsTraits {
    public function getAllParents()
    {
        return $this->parentModel::get();
    }

    public function GetParentById($parentId)
    {
        return $this->parentModel::find($parentId);
    }

}
