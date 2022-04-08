<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SectionsInterface;
use App\Http\Requests\AddSectionRequest;
use App\Http\Requests\DeleteSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $sectionInterface;

    public function __construct(SectionsInterface $sectionInterface)
    {
        $this->sectionInterface = $sectionInterface;
    }

    public function index()
    {
        return $this->sectionInterface->index();

    }

    public function getClasses( $gradeId)
    {
        return $this->sectionInterface->getClasses($gradeId);
    }


    public function store(AddSectionRequest $request)
    {
        return $this->sectionInterface->store($request);
    }

    public function update(UpdateSectionRequest $request)
    {
        return $this->sectionInterface->update($request);
    }

    public function destroy(DeleteSectionRequest $request)
    {
        return $this->sectionInterface->destroy($request);
    }

}
