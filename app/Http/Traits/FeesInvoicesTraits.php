<?php
namespace App\Http\Traits;

trait FeesInvoicesTraits {
    public function getAllFeesInvoices()
    {
        return $this->feeInvoiceModel::get();
    }

    public function getFeeInvoiceById($feeInvoiceId)
    {
        return $this->feeInvoiceModel::findOrFail($feeInvoiceId);
    }

}
