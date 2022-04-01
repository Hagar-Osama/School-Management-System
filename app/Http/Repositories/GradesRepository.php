<?php

namespace App\Http\Repositories;

use App\Models\Grade;
use App\Http\Interfaces\GradesInterface;
use App\Http\Traits\GradesTraits;

class GradesRepository implements GradesInterface
{
    private $gradesModel;
    use GradesTraits;

    public function __construct(Grade $grades)
    {
        $this->gradesModel = $grades;
    }

    public function index()
    {
        $grades = $this->getAllGrades();
        return view('Grades.grades', compact('grades'));
    }

    public function store($request)
    {
        try{
            $grade = new grade();
            $grade->name = [
                'en' => $request->name_en,
                'ar' => $request->name
            ];
            $grade->notes = $request->notes;

            $grade->save();
            toastr()->success(trans('messages.success'));
            return redirect(route('grades.index'));
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' =>$e->getMessage()]);

        }

    }
}
