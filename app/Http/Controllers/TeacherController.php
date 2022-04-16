<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TeachersInterface;
use App\Http\Requests\AddTeacherRequest;
use App\Http\Requests\DeleteTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teacherInterface;

    public function __construct(TeachersInterface $teacherInterface)
    {
        $this->teacherInterface = $teacherInterface;
    }

    public function index()
    {
        return $this->teacherInterface->index();

    }

    public function create()
    {
        return $this->teacherInterface->create();

    }

    public function store(AddTeacherRequest $request)
    {
        return $this->teacherInterface->store($request);
    }

    public function edit($id)
    {
        return $this->teacherInterface->edit($id);

    }

    public function update(UpdateTeacherRequest $request)
    {
        return $this->teacherInterface->update($request);
    }

    public function destroy(DeleteTeacherRequest $request)
    {
        return $this->teacherInterface->destroy($request);
    }
}
