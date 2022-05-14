<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ExamsInterface;
use App\Http\Requests\AddExamRequest;
use App\Http\Requests\DeleteExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $examInterface;

    public function __construct(ExamsInterface $examInterface)
    {
        $this->examInterface = $examInterface;
    }

    public function index()
    {
        return $this->examInterface->index();

    }

    public function create()
    {
        return $this->examInterface->create();

    }

    public function store(AddExamRequest $request)
    {
        return $this->examInterface->store($request);
    }

    public function edit($examId)
    {
        return $this->examInterface->edit($examId);

    }

    public function update(UpdateExamRequest $request)
    {
        return $this->examInterface->update($request);
    }

    public function destroy(DeleteExamRequest $request)
    {
        return $this->examInterface->destroy($request);
    }
}
