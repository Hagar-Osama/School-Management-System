<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\FeesInvoicesInterface;
use App\Http\Requests\AddFeesInvoiceRequest;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller
{
    private $feesInvoicesInterface;

    public function __construct(FeesInvoicesInterface $feesInvoicesInterface)
    {
        $this->feesInvoicesInterface = $feesInvoicesInterface;
    }

    public function index()
    {
        return $this->feesInvoicesInterface->index();

    }

    // public function getAmount($feeId)
    // {
    //     return $this->feesInvoicesInterface->getAmount($feeId);

    // }


    public function create($student_id)
    {
        return $this->feesInvoicesInterface->create($student_id);
    }

    public function store(AddFeesInvoiceRequest $request)
    {
        return $this->feesInvoicesInterface->store($request);
    }
}
