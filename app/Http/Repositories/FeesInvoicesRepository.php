<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\FeesInvoicesInterface;
use App\Http\Traits\FeesInvoicesTraits;
use App\Http\Traits\FeesTraits;
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
    use FeesInvoicesTraits;
    use FeesTraits;


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
        $feesInvoices = $this->getAllFeesInvoices();
        return view('FeeInvoices.index', compact('feesInvoices'));
    }

    public function create($student_id)
    {
        //to make ana invoice for the student first i need to get the details of the student by getting its id
        $student = $this->GetStudentById($student_id);
        //then go to the fees table and get me the fees of a specific class required to be paid
        $fees = $this->feeModel::where('class_id', $student->class_id)->get(); //where the classid in the fees table equal class id in the student table
        return view('FeeInvoices.create', compact('student', 'fees'));
    }

    // public function getAmount($feeId)
    // {
    //     $amount  = $this->feeModel::where('id', $feeId)->pluck('amount', 'id');
    //     return json_encode($amount);
    // }

    public function store($request)
    {
        $fees_list = $request->fees_list;
        DB::beginTransaction();

        try {
            //store data in feesInvoice table
            foreach ($fees_list as $fee_list) {
                $feeInvoice =   $this->feeInvoiceModel::create([
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
                    'date' => date('y-m-d'),
                    'type' => 'invoice',
                    'fee_invoice_id' => $feeInvoice->id,
                    'credit' => 0.00,
                    'debit' => $fee_list['amount'],
                    'description' => $fee_list['description'],
                ]);
            }

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('feesInvoices.index'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($feeInvoiceId)
    {
        $feeInvoice = $this->getFeeInvoiceById($feeInvoiceId);
        $fees = $this->feeModel::where('class_id', $feeInvoice->class_id)->get();
        return view('FeeInvoices.edit', compact('feeInvoice', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {

            $feeInvoice = $this->getFeeInvoiceById($request->feeInvoice_id);
            $feeInvoice->update([
                'fee_id' => $request->fee_id,
                'amount' => $request->amount,
                'description' => $request->description,
            ]);
            //after updating fee_invoices table we nee to update student_accounts table
            //where fee_invoice_id in the students account table equals to feeinvoiceid that i clicked on in the page to edit it
            $studentAccount = $this->studentAccountModel::where('fee_invoice_id', $request->feeInvoice_id)->first();
            $studentAccount->update([
                'debit' => $request->amount,
                'description' => $request->description,
            ]);

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect(route('feesInvoices.index'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $feeInvoice = $this->getFeeInvoiceById($request->feeInvoice_id);
        $feeInvoice->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('feesInvoices.index'));

    }
}
