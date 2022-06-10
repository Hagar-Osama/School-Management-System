<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    private $sectionModel;
    private $classModel;
    public function __construct( Section $section, Classes $class)
    {
     
        $this->sectionModel = $section;
        $this->classModel = $class;
        $this->middleware('auth:web,teacher');

        
    }

    public function getClasses($gradeId)
    {
        //when i choose the grades in blade i want to get the classes belongs to this grade
        $classes = $this->classModel::where('grade_id', $gradeId)->pluck('name', 'id');
        return json_encode($classes);
    }

    public function getSections($classId)
    {
        //when i choose the classes in blade i want to get the sections belongs to this class

        $sections = $this->sectionModel::where('class_id', $classId)->pluck('name', 'id');
        return json_encode($sections);
    }
}
