<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SectionsInterface;
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

    public function store( $request)
    {
        return $this->sectionInterface->store($request);
    }

    public function update( $request)
    {
        return $this->sectionInterface->update($request);
    }

    public function destroy( $request)
    {
        return $this->sectionInterface->destroy($request);
    }

}
