<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\StudentsAccountInterface;
use App\Http\Traits\FeesTraits;
use App\Http\Traits\GradesTraits;
use App\Models\Fee;
use App\Models\Grade;
use Exception;

class StudentsAccountRepository implements StudentsAccountInterface
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

    }

    public function create()
    {

    }

    public function store($request)
    {

        try {


            toastr()->success(trans('messages.success'));
            return redirect(route('fees.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($fee_id)
    {

    }

    public function update($request)
    {
        try {

            toastr()->success(trans('messages.update'));
            return redirect(route('fees.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
    }

    public function destroy($request)
    {

        toastr()->error(trans('messages.delete'));
        return redirect(route('fees.index'));
    }
}
