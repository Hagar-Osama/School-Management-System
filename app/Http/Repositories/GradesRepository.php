<?php

namespace App\Http\Repositories;

use App\Models\Grade;
use App\Http\Interfaces\GradesInterface;
use App\Http\Traits\GradesTraits;
use App\Models\Classes;
use Exception;

class GradesRepository implements GradesInterface
{
    private $gradesModel;
    private $classesModel;
    use GradesTraits;

    public function __construct(Grade $grades, Classes $classes)
    {
        $this->gradesModel = $grades;
        $this->classesModel = $classes;
    }

    public function index()
    {
        $grades = $this->getAllGrades();
        return view('Grades.grades', compact('grades'));
    }

    public function store($request)
    {
        // if($this->gradesModel::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists()) {
        //     return redirect()->back()->withErrors(trans('grades.Exists'));
        // }
        try {
            $grade = new grade();
            $grade->name = [
                'en' => $request->name_en,
                'ar' => $request->name
            ];
            $grade->notes = $request->notes;

            $grade->save();
            toastr()->success(trans('messages.success'));
            return redirect(route('grades.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $grade = $this->GetGradeById($request->grade_id);
            $grade->update([
                $grade->name = [
                    'en' => $request->name_en,
                    'ar' => $request->name
                ],
                $grade->notes = $request->notes,
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('grades.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        //here we get the grade_id from classes table and check whether it has grade belonges to it or not
        //if it has he cant delete the grades until he delete the classes first
        $grades = $this->classesModel::where('grade_id', $request->grade_id)->pluck('grade_id');
        if($grades->count() == 0) {
            $grade = $this->GetGradeById($request->grade_id);
            $grade->delete();
            toastr()->error(trans('messages.delete'));
            return redirect(route('grades.index'));

        }else {
            toastr()->error(trans('messages.delete_warning'));
            return redirect(route('grades.index'));
        }
    }
}
