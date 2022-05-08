<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\StudentsAccountInterface;
use Illuminate\Http\Request;

class StudentAccountController extends Controller
{
    private $studentAccountInterface;

    public function __construct(StudentsAccountInterface $studentAccountInterface)
    {
        $this->studentAccountInterface = $studentAccountInterface;
    }

    public function index()
    {
        return $this->studentAccountInterface->index();

    }

    public function create()
    {
        return $this->studentAccountInterface->create();

    }

    public function store($request)
    {
        return $this->studentAccountInterface->store($request);
    }

    public function edit($id)
    {
        return $this->studentAccountInterface->edit($id);

    }

    public function update($request)
    {
        return $this->studentAccountInterface->update($request);
    }

    public function show($id)
    {
        return $this->studentAccountInterface->show($id);
    }

    public function destroy($request)
    {
        return $this->studentAccountInterface->destroy($request);
    }
}
