<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\GraduatedStudentsInterface;
use App\Http\Requests\DeleteGraduatedStudentRequest;

class GraduatedStudentController extends Controller
{
    private $graduatedStudentsInterface;

    public function __construct(GraduatedStudentsInterface $graduatedStudentsInterface)
    {
        $this->graduatedStudentsInterface = $graduatedStudentsInterface;
    }

    public function index()
    {
        return $this->graduatedStudentsInterface->index();

    }

    public function create()
    {
        return $this->graduatedStudentsInterface->create();
    }

    public function graduateStudent(DeleteGraduatedStudentRequest $request)
    {
        return $this->graduatedStudentsInterface->graduateStudent($request);
    }

    public function unarchiveStudent(DeleteGraduatedStudentRequest $request)
    {
        return $this->graduatedStudentsInterface->unarchiveStudent($request);
    }

    public function destroy(DeleteGraduatedStudentRequest $request)
    {
        return $this->graduatedStudentsInterface->destroy($request);
    }
}
