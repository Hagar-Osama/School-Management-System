<?php
namespace App\Http\Traits;

trait PaymentsTraits {
    
    public function getAllPayments()
    {
        return $this->paymentModel::get();
    }

    public function getPaymentById($paymentId)
    {
        return $this->paymentModel::findOrFail($paymentId);
    }

}
