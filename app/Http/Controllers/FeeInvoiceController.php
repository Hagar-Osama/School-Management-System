<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\FeesInvoicesInterface;
use App\Http\Requests\AddFeesInvoiceRequest;
use App\Http\Requests\DeleteFeeInvoiceRequest;
use App\Http\Requests\UpdateFeeInvoiceRequest;
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

    public function edit($feeInvoiceId)
    {
        return $this->feesInvoicesInterface->edit($feeInvoiceId);
    }

    public function update(UpdateFeeInvoiceRequest $request)
    {
        return $this->feesInvoicesInterface->update($request);
    }

    public function destroy(DeleteFeeInvoiceRequest $request)
    {
        return $this->feesInvoicesInterface->destroy($request);
    }

    
}
