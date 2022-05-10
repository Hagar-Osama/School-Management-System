<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\FeesInterface;
use App\Http\Traits\FeesTraits;
use App\Http\Traits\GradesTraits;
use App\Models\Fee;
use App\Models\Grade;
use Exception;

class FeesRepository implements FeesInterface
{
    private $feeModel;
    private $gradesModel;
    use FeesTraits;
    use GradesTraits;



    public function __construct(Fee $fees, Grade $grade)
    {
        $this->feeModel = $fees;
        $this->gradesModel = $grade;
    }

    public function index()
    {
        $fees = $this->getAllFees();
        return view('Fees.index', compact('fees'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        return view('Fees.create', compact('grades'));
    }

    public function store($request)
    {

        try {
            $fees = new fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount = $request->amount;
            $fees->grade_id = $request->grade_id;
            $fees->class_id = $request->class_id;
            $fees->year = $request->year;
            $fees->description = $request->description;
            $fees->fees_type = $request->fees_type;

            $fees->save();

            toastr()->success(trans('messages.success'));
            return redirect(route('fees.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($fee_id)
    {
        $fee = $this->getFeeById($fee_id);
        $grades = $this->getAllGrades();
        return view('Fees.edit', compact('fee', 'grades'));
    }

    public function update($request)
    {
        try {
            $fee = $this->GetFeeById($request->fee_id);
            $fee->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fee->amount = $request->amount;
            $fee->grade_id = $request->grade_id;
            $fee->class_id = $request->class_id;
            $fee->year = $request->year;
            $fee->description = $request->description;
            $fee->fees_type = $request->fees_type;

            $fee->save();
            toastr()->success(trans('messages.update'));
            return redirect(route('fees.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        $fee = $this->getFeeById($request->fee_id);
        $fee->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('fees.index'));
    }
}
