<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\FeesInvoicesInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\StudentsTraits;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;

class FeesInvoicesRepository implements FeesInvoicesInterface
{
    private $studentModel;
    private $feeModel;
    private $feeInvoiceModel;
    private $studentAccountModel;
    private $gradesModel;
    use StudentsTraits;
    use GradesTraits;


    public function __construct(Student $student, Fee $fees, FeeInvoice $feeInvoice, StudentAccount $studentAccount, Grade $grades)
    {
        $this->studentModel = $student;
        $this->feeModel = $fees;
        $this->feeInvoiceModel = $feeInvoice;
        $this->studentAccountModel = $studentAccount;
        $this->gradesModel = $grades;
    }

    public function index()
    {
        $feesInvoices = $this->feeInvoiceModel::get();
        return view('Fees.feesInvoicesIndex', compact('feesInvoices'));
    }

    public function create($student_id)
    {
        //to make ana invoice for the student first i need to get the details of the student by getting its id
        $student = $this->GetStudentById($student_id);
        //then go to the fees table and get me the fees of a specific class required to be paid
        $fees = $this->feeModel::where('class_id', $student->class_id)->get(); //where the classid in the fees table equal class id in the student table
        return view('Fees.addInvoice', compact('student', 'fees'));
    }

    public function getAmount($feeId)
    {
        $amount  = $this->feeModel::where('id', $feeId)->pluck('amount', 'id');
        return json_encode($amount);
    }

    public function store($request)
    {
        $fees_list = $request->fees_list;
        DB::beginTransaction();

        try {
            //store data in feesInvoice table
            foreach ($fees_list as $fee_list) {
                $this->feeInvoiceModel::create([
                    'invoice_date' => date('y-m-d'),
                    'student_id' => $fee_list['student_id'],
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'fee_id' => $fee_list['fee_id'],
                    'amount' => $fee_list['amount'],
                    'description' => $fee_list['description'],
                ]);
                //now we need to store data in the studentaccount table
                $this->studentAccountModel::create([
                    'student_id' => $fee_list['student_id'],
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'cretit' => 0.00,
                    'debit' => $fee_list['amount'],
                    'description' => $fee_list['description'],
                ]);
            }

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('feesInvoices.index'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
