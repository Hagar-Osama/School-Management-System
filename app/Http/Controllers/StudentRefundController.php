<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\StudentRefundsInterface;
use App\Http\Requests\AddStudentRefundRequest;
use App\Http\Requests\DeleteStudentRefundRequest;
use App\Http\Requests\UpdateStudentRefundRequest;
use Illuminate\Http\Request;

class StudentRefundController extends Controller
{
    private $studentRefundInterface;

    public function __construct(StudentRefundsInterface $studentRefundInterface)
    {
        $this->studentRefundInterface = $studentRefundInterface;
    }

    public function index()
    {
        return $this->studentRefundInterface->index();

    }

    public function create($student_id)
    {
        return $this->studentRefundInterface->create($student_id);

    }

    public function store(AddStudentRefundRequest $request)
    {
        return $this->studentRefundInterface->store($request);
    }

    public function edit($id)
    {
        return $this->studentRefundInterface->edit($id);

    }

    public function update(UpdateStudentRefundRequest $request)
    {
        return $this->studentRefundInterface->update($request);
    }

    public function destroy(DeleteStudentRefundRequest $request)
    {
        return $this->studentRefundInterface->destroy($request);
    }
}
