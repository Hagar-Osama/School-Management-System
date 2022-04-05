<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ClassesInterface;
use App\Http\Traits\ClassesTraits;
use App\Http\Traits\GradesTraits;
use App\Models\Classes;
use App\Models\Grade;
use Exception;

class ClassesRepository implements ClassesInterface
{
    private $classModel;
    private $gradesModel;
    use ClassesTraits;
    use GradesTraits;

    public function __construct(Classes $classes, Grade $grades)
    {
        $this->classModel = $classes;
        $this->gradesModel = $grades;
    }

    public function index()
    {
        $classes = $this->getAllClasses();
        $grades = $this->getAllGrades();
        return view('Classes.classes', compact('classes', 'grades'));
    }

    public function store($request)
    {
        $class_lists = $request->class_lists;
        try {
            foreach ($class_lists as $class_list) {
                $classes = new Classes();
                $classes->name = ['ar' => $class_list['name'], 'en' => $class_list['name_en']];
                $classes->grade_id = $class_list['grade_id'];
                $classes->save();
            }

            toastr()->success(trans('messages.success'));
            return redirect(route('classes.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $class = $this->GetClassById($request->class_id);
            $class->update([
                $class->name =['ar' => $request->name, 'en' => $request->name_en],
                $class->grade_id = $request->grade_id
            ]);

            toastr()->success(trans('messages.update'));
            return redirect(route('classes.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $class = $this->GetClassById($request->class_id);
        $class->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('classes.index'));
    }
}
