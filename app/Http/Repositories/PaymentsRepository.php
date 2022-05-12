<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PaymentsInterface;
use App\Http\Traits\PaymentsTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Fund;
use App\Models\Payment;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;

class PaymentsRepository implements PaymentsInterface
{
    private $paymentModel;
    private $studentModel;
    private $fundModel;
    private $studentAccountModel;
    use PaymentsTraits;
    use StudentsTraits;


    public function __construct(Payment $payment, Student $student, Fund $fund, StudentAccount $studentAccount)
    {
        $this->paymentModel = $payment;
        $this->studentModel = $student;
        $this->fundModel = $fund;
        $this->studentAccountModel = $studentAccount;
    }

    public function index()
    {
        $payments = $this->getAllPayments();
        return view('Payments.index', compact('payments'));
    }

    public function create($student_id)
    {
        $student = $this->GetStudentById($student_id);
        return view('Payments.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            //first we store in payments table
            $payment = $this->paymentModel::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description
            ]);
            //then we store in the funds table
            //bec. fund is taking money the credit is zero coz in this case fund is debtor
            $this->fundModel::create([
                'date' => date('y-m-d'),
                'payment_id' => $payment->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description
            ]);
            //and finally store data in student account table
            //coz student i s paying money in this case he becomes a creditor thats why debit is zero
            $this->studentAccountModel::create([
                'date' => date('y-m-d'),
                'type' => 'receipt',
                'payment_id' => $payment->id,
                'student_id' => $request->student_id,
                'credit' => $request->debit,
                'debit' => 0.00,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('payments.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function edit($payment_id)
    {
        $payment = $this->getPaymentById($payment_id);
        return view('Payments.edit', compact('payment'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $payment = $this->getPaymentById($request->payment_id);
            $payment->update([
                'date' => date('y-m-d'),
                'debit' => $request->debit,
                'description' => $request->description
            ]);
            $fund = $this->fundModel::where('payment_id', $request->payment_id)->first();
            $fund->update([
                'date' => date('y-m-d'),
                'payment_id' => $payment->id,
                'debit' => $request->debit,
                'credit' => 0.00,
                'description' => $request->description
            ]);
            $studentAccount = $this->studentAccountModel::where('payment_id', $request->payment_id)->first();
            $studentAccount->update([
                'date' => date('y-m-d'),
                'type' => 'receipt',
                'payment_id' => $payment->id,
                'credit' => $request->debit,
                'debit' => 0.00,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect(route('payments.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $payment = $this->getPaymentById($request->payment_id);
        $payment->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('payments.index'));
    }
}
