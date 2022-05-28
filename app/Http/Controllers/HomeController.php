<?php

namespace App\Http\Controllers;

use App\Models\myParent;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $studentModel;
    private $parentModel;
    private $teacherModel;
    private $sectionModel;

    public function __construct(Student $student, myParent $parent, Teacher $teacher, Section $section)
    {
        $this->studentModel = $student;
        $this->parentModel = $parent;
        $this->teacherModel = $teacher;
        $this->sectionModel = $section;
    }
    public function select()
    {
        return view('auth.selection');
    }

    public function index()
    {
        $data['students'] = $this->studentModel::count();
        $data['teachers'] = $this->teacherModel::count();
        $data['parents'] = $this->parentModel::count();
        $data['sections'] = $this->sectionModel::count();

        return view('dashboard', $data);

    }
}
