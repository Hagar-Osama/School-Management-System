<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ClassesInterface;
use App\Http\Requests\AddClassRequest;
use App\Http\Requests\DeleteClassRequest;
use App\Http\Requests\UpdateClassRequest;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    private $classesInterface;

    public function __construct(ClassesInterface $classesInterface)
    {
        $this->classesInterface = $classesInterface;
    }

    public function index()
    {
        return $this->classesInterface->index();

    }

    public function store(AddClassRequest $request)
    {
        return $this->classesInterface->store($request);
    }

    public function update(UpdateClassRequest $request)
    {
        return $this->classesInterface->update($request);
    }

    public function destroy(DeleteClassRequest $request)
    {
        return $this->classesInterface->destroy($request);
    }

}
