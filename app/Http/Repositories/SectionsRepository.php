<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SectionsInterface;
use App\Http\Traits\ClassesTraits;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\SectionsTraits;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Section;
use Exception;

class SectionsRepository implements SectionsInterface
{
    private $classModel;
    private $sectionModel;
    private $gradesModel;
    use SectionsTraits;
    use ClassesTraits;
    use GradesTraits;

    public function __construct(Classes $classes, Section $section, Grade $grade)
    {
        $this->classModel = $classes;
        $this->sectionModel = $section;
        $this->gradesModel = $grade;
    }

    public function index()
    {
        $gradeSections = $this->gradesModel::with('sections')->get();
        $grades = $this->getAllGrades();
        return view('Sections.sections', compact('gradeSections', 'grades'));
    }

    public function store($request)
    {
        try {


            toastr()->success(trans('messages.success'));
            return redirect(route('sections.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            toastr()->success(trans('messages.update'));
            return redirect(route('sections.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        toastr()->error(trans('messages.delete'));
        return redirect(route('sections.index'));
    }




}
