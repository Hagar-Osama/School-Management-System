<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\StudentsInterface;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\DeleteStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $studentsInterface;

    public function __construct(StudentsInterface $studentsInterface)
    {
        $this->studentsInterface = $studentsInterface;
    }

    public function index()
    {
        return $this->studentsInterface->index();

    }

    public function getClasses( $gradeId)
    {
        return $this->studentsInterface->getClasses($gradeId);
    }

    public function getSections( $classId)
    {
        return $this->studentsInterface->getSections($classId);
    }

    public function create()
    {
        return $this->studentsInterface->create();

    }

    public function store(AddStudentRequest $request)
    {
        return $this->studentsInterface->store($request);
    }

    public function edit($id)
    {
        return $this->studentsInterface->edit($id);

    }

    public function update(UpdateStudentRequest $request)
    {
        return $this->studentsInterface->update($request);
    }

    public function destroy(DeleteStudentRequest $request)
    {
        return $this->studentsInterface->destroy($request);
    }
}
