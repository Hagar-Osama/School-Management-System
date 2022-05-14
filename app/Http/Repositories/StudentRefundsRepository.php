<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentRefundsInterface;
use App\Http\Traits\StudentRefundsTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Fund;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\StudentRefund;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentRefundsRepository implements StudentRefundsInterface
{
    private $studentModel;
    private $studentAccountModel;
    private $studentRefundModel;
    private $fundModel;
    use StudentsTraits;
    use StudentRefundsTraits;


    public function __construct(StudentRefund $studentRefund, Student $student, StudentAccount $studentAccount, Fund $fund)
    {
        $this->studentRefundModel = $studentRefund;
        $this->studentModel = $student;
        $this->studentAccountModel = $studentAccount;
        $this->fundModel = $fund;
    }

    public function index()
    {
        $studentRefunds = $this->getAllStudentRefund();
        return view('StudentsRefunds.index', compact('studentRefunds'));
    }

    public function create($student_id)
    {
        $student = $this->GetStudentById($student_id);
        return view('StudentsRefunds.create', compact('student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            //first we store in student refund table
           $studentRefund = $this->studentRefundModel::create([
                'date' => date('y-m-d'),
                'student_id' => $request->student_id,
                'amount' => $request->debit,
                'description' => $request->description
            ]);

            //and finally store data in student account table
            //coz student is taking his money back but at the same time he owes money to the school, in this case he becomes a debtor thats why credit is zero
            $this->studentAccountModel::create([
                'date' => date('y-m-d'),
                'type' => 'student refund',
                'student_refund_id' => $studentRefund->id,
                'student_id' => $request->student_id,
                'credit' => 0.00,
                'debit' => $request->debit,
                'description' => $request->description
            ]);
            //now we need to remove from the funds table the amount returned to the student and coz it pays money then the fund here is creditor not debtor
            $this->fundModel::create([
                'date' => date('y-m-d'),
                'student_refund_id' => $studentRefund->id,
                'debit' => 0.00 ,
                'credit' => $request->debit,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('studentRefunds.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($studentRefund_id)
    {
        $studentRefund = $this->getStudentRefundById($studentRefund_id);
        return view('StudentsRefunds.edit', compact('studentRefund'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $studentRefund = $this->getStudentRefundById($request->studentRefund_id);
            $studentRefund->update([
                'date' => date('y-m-d'),
                'amount' => $request->debit,
                'description' => $request->description
            ]);

            $studentAccount = $this->studentAccountModel::where('student_refund_id', $request->studentRefund_id)->first();
            $studentAccount->update([
                'date' => date('y-m-d'),
                'student_refund_id' => $studentRefund->id,
                'credit' => 0.00,
                'debit' => $request->debit,
                'description' => $request->description
            ]);

            $fund = $this->fundModel::where('student_refund_id', $request->studentRefund_id)->first();
            $fund->update([
                'date' => date('y-m-d'),
                'student_refund_id' => $studentRefund->id,
                'debit' => 0.00 ,
                'credit' => $request->debit,
                'description' => $request->description
            ]);

            DB::commit();
            toastr()->success(trans('messages.update'));
            return redirect(route('studentRefunds.index'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $studentRefund = $this->getStudentRefundById($request->studentRefund_id);
        $studentRefund->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('studentRefunds.index'));
    }
}
