<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RefundsInterface;
use App\Http\Traits\RefundsTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Refund;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;

class RefundsRepository implements RefundsInterface
{
    private $studentModel;
    private $studentAccountModel;
    private $refundModel;
    use RefundsTraits;
    use StudentsTraits;


    public function __construct(Refund $refund, Student $student, StudentAccount $studentAccount)
    {
        $this->refundModel = $refund;
        $this->studentModel = $student;
        $this->studentAccountModel = $studentAccount;
    }

    public function index()
    {
        $refunds = $this->getAllRefund();
        return view('Refunds.index', compact('refunds'));
    }

    public function create($student_id)
    {
        $student = $this->GetStudentById($student_id);
        return view('Refunds.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            //first we store in refund table
           $refund = $this->refundModel::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description
            ]);
            
            //and finally store data in student account table
            //coz student is taking his money back in this case he becomes a creditor thats why debit is zero
            $this->studentAccountModel::create([
                'date' => date('y-m-d'),
                'type' => 'refund',
                'refund_id' => $refund->id,
                'student_id' => $request->student_id,
                'credit' => $request->debit,
                'debit' => 0.00,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('refunds.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function edit($refund_id)
    {
        $refund = $this->getRefundById($refund_id);
        return view('Refunds.edit', compact('refund'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $refund = $this->getRefundById($request->refund_id);
            $refund->update([
                'date' => date('y-m-d'),
                'amount' => $request->debit,
                'description' => $request->description
            ]);
            
            $studentAccount = $this->studentAccountModel::where('refund_id', $request->refund_id)->first();
            $studentAccount->update([
                'date' => date('y-m-d'),
                'refund_id' => $refund->id,
                'credit' => $request->debit,
                'debit' => 0.00,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect(route('refunds.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $refund = $this->getRefundById($request->refund_id);
        $refund->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('refunds.index'));
    }
}
