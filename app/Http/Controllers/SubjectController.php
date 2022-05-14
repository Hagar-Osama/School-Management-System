<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SubjectsInterface;
use App\Http\Requests\AddSubjectRequest;
use App\Http\Requests\DeleteSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private $subjectInterface;

    public function __construct(SubjectsInterface $subjectInterface)
    {
        $this->subjectInterface = $subjectInterface;
    }

    public function index()
    {
        return $this->subjectInterface->index();

    }

    public function create()
    {
        return $this->subjectInterface->create();

    }

    public function store(AddSubjectRequest $request)
    {
        return $this->subjectInterface->store($request);
    }

    public function edit($id)
    {
        return $this->subjectInterface->edit($id);

    }

    public function update(UpdateSubjectRequest $request)
    {
        return $this->subjectInterface->update($request);
    }

    public function destroy(DeleteSubjectRequest $request)
    {
        return $this->subjectInterface->destroy($request);
    }
}
