<?php
namespace App\Http\Traits;

trait FeesTraits {
    public function getAllFees()
    {
        return $this->feeModel::get();
    }

    public function getFeeById($feeId)
    {
        return $this->feeModel::findOrFail($feeId);
    }

}
