<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SectionsInterface;
use App\Http\Traits\ClassesTraits;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\SectionsTraits;
use App\Http\Traits\TeachersTraits;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Exception;

class SectionsRepository implements SectionsInterface
{
    private $classModel;
    private $sectionModel;
    private $gradesModel;
    private $teacherModel;
    use SectionsTraits;
    use ClassesTraits;
    use GradesTraits;
    use TeachersTraits;

    public function __construct(Classes $classes, Section $section, Grade $grade, Teacher $teacher)
    {
        $this->classModel = $classes;
        $this->sectionModel = $section;
        $this->gradesModel = $grade;
        $this->teacherModel = $teacher;
    }

    public function index()
    {
        $grades = $this->gradesModel::with('sections')->get();
        // $grades = $this->getAllGrades();
        $teachers = $this->getAllTeachers();
        return view('Sections.sections', compact( 'grades', 'teachers'));
    }

    public function getClasses($gradeId)
    {
        //when i choose the grades i want to get the classes belongs to this grade
        $classes = $this->classModel::where('grade_id', $gradeId)->pluck('name', 'id');
        return json_encode($classes);
    }

    public function store($request)
    {
        try {
            $sections = new section();
            $sections->name = [
                'ar' => $request->name,
                'en' => $request->name_en
            ];
            $sections->class_id = $request->class_id;
            $sections->grade_id = $request->grade_id;
            $sections->status = 1;
            $sections->save();
            $sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
            return redirect(route('sections.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $section = $this->GetSectionById($request->section_id);

            $section->name = [
                'ar' => $request->name,
                'en' => $request->name_en
            ];
            $section->class_id = $request->class_id;
            $section->grade_id = $request->grade_id;
            if (isset($request->status)) {
                $section->status = 1;
            } else {
                $section->status = 2;
            }
            if(isset($request->teacher_id)) {
                $section->teachers()->sync($request->teacher_id);
            }else{
                //here i add more than one id
                $section->teachers()->sync(array());
            }
            $section->save();
            toastr()->success(trans('messages.update'));
            return redirect(route('sections.index'));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $section = $this->GetSectionById($request->section_id);
        $section->delete();
        toastr()->error(trans('messages.delete'));
        return redirect(route('sections.index'));
    }
}
