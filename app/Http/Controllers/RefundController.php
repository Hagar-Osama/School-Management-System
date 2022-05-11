<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\RefundsInterface;
use App\Http\Requests\AddRefundRequest;
use App\Http\Requests\DeleteRefundRequest;
use App\Http\Requests\UpdateRefundRequest;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    private $refundInterface;

    public function __construct(RefundsInterface $refundInterface)
    {
        $this->refundInterface = $refundInterface;
    }

    public function index()
    {
        return $this->refundInterface->index();

    }

    public function create($student_id)
    {
        return $this->refundInterface->create($student_id);

    }

    public function store(AddRefundRequest $request)
    {
        return $this->refundInterface->store($request);
    }

    public function edit($id)
    {
        return $this->refundInterface->edit($id);

    }

    public function update(UpdateRefundRequest $request)
    {
        return $this->refundInterface->update($request);
    }

    public function destroy(DeleteRefundRequest $request)
    {
        return $this->refundInterface->destroy($request);
    }
}
