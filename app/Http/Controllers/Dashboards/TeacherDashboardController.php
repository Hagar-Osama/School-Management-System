<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller
{
    private $teacherModel;
    private $studentModel;
    public function __construct(Teacher $teacher, Student $student)
    {
        $this->teacherModel = $teacher;
        $this->studentModel = $student;
    }
    public function teacherDashboard()
    {
        //first i need to know the teacher who is opening the dashboard then get
        //the sections that belogs to him then get the totoal number of these sections
        $teacher = auth()->user()->id;
        $sections = $this->teacherModel::findOrFail($teacher)->sections()->pluck('section_id');
        $sectionCount = $sections->count();
        //now we need the total number of students
        //where section id in the students table equal to the sections belonging to the teacher
        $students = $this->studentModel::whereIn('section_id', $sections)->count();
        return view('Teachers.dashboard.dashboard', compact('sectionCount', 'students'));
    }

    public function getStudentNames()
    {
        $teacher = auth()->user()->id;
        $sections = DB::table('section_teacher')->where('teacher_id', $teacher)->pluck('section_id');
        $students = $this->studentModel::whereIn('section_id', $sections)->get();
        return view('Teachers.dashboard.students', compact('students'));


    }
}
