<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\GradesInterface;
use App\Http\Requests\AddGradesRequest;
use App\Http\Requests\DeleteGradesRequest;
use App\Http\Requests\UpdateGradesRequest;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    private $gradesInterface;

    public function __construct(GradesInterface $gradesInterface)
    {
        $this->gradesInterface = $gradesInterface;
    }

    public function index()
    {
        return $this->gradesInterface->index();

    }

    public function store(AddGradesRequest $request)
    {
        return $this->gradesInterface->store($request);
    }

    public function update(UpdateGradesRequest $request)
    {
        return $this->gradesInterface->update($request);
    }

    public function destroy(DeleteGradesRequest $request)
    {
        return $this->gradesInterface->destroy($request);
    }

}
