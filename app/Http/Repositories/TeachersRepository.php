<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\TeachersInterface;
use App\Http\Traits\TeachersTraits;
use App\Models\Teacher;
use Exception;

class TeachersRepository implements TeachersInterface
{
    private $teacherModel;
    use TeachersTraits;


    public function __construct(Teacher $teacher)
    {
        $this->teacherModel = $teacher;
    }

    public function index()
    {
        $teachers = $this->getAllTeachers();
        return view('Teachers.teachers', compact('teachers'));
    }

    public function create()
    {
        return view('Teachers.create');
    }

    public function store($request)
    {

        try {

            toastr()->success(trans('messages.success'));
            return redirect(route('teachers.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {

    }

    public function update($request)
    {
        try {

            toastr()->success(trans('messages.update'));
            return redirect(route('teachers.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {



            toastr()->error(trans('messages.delete'));
            return redirect(route('teachers.index'));

    }
}
