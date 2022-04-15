<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\TeachersInterface;
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

    public function store( $request)
    {
        return $this->teacherInterface->store($request);
    }

    public function edit($id)
    {
        return $this->teacherInterface->edit($id);

    }

    public function update( $request)
    {
        return $this->teacherInterface->update($request);
    }

    public function destroy( $request)
    {
        return $this->teacherInterface->destroy($request);
    }
}
