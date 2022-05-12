<?php
namespace App\Http\Traits;

trait StudentRefundsTraits {
    
    public function getAllStudentRefund()
    {
        return $this->studentRefundModel::get();
    }

    public function getStudentRefundById($studentRefundId)
    {
        return $this->studentRefundModel::findOrFail($studentRefundId);
    }

}
