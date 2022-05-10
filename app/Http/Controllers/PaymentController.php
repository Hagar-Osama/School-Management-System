<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PaymentsInterface;
use App\Http\Requests\AddPaymentRequest;
use App\Http\Requests\DeletePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentInterface;

    public function __construct(PaymentsInterface $paymentInterface)
    {
        $this->paymentInterface = $paymentInterface;
    }

    public function index()
    {
        return $this->paymentInterface->index();

    }

    public function create($student_id)
    {
        return $this->paymentInterface->create($student_id);

    }

    public function store(AddPaymentRequest $request)
    {
        return $this->paymentInterface->store($request);
    }

    public function edit($id)
    {
        return $this->paymentInterface->edit($id);

    }

    public function update(UpdatePaymentRequest $request)
    {
        return $this->paymentInterface->update($request);
    }

    public function destroy(DeletePaymentRequest $request)
    {
        return $this->paymentInterface->destroy($request);
    }
}
