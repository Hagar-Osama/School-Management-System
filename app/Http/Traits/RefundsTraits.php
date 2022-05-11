<?php
namespace App\Http\Traits;

trait RefundsTraits {
    public function getAllRefund()
    {
        return $this->refundModel::get();
    }

    public function getRefundById($refundId)
    {
        return $this->refundModel::findOrFail($refundId);
    }

}
