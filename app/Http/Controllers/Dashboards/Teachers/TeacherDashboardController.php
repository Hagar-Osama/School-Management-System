<?php

namespace App\Http\Controllers\Dashboards\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAttendanceRequest;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherDashboardController extends Controller
{
    private $teacherModel;
    private $studentModel;
    private $sectionModel;
    private $attendanceModel;


    public function __construct(Teacher $teacher, Student $student, Section $section, Attendance $attendance)
    {
        $this->teacherModel = $teacher;
        $this->studentModel = $student;
        $this->sectionModel = $section;
        $this->attendanceModel = $attendance;
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
        // $students = $this->studentModel::with('attendances')->whereIn('section_id', $sections)->get();
        return view('Teachers.dashboard.students', compact('students'));
    }

    public function showSections()
    {
        $teacher = auth()->user()->id;
        $sectionId = DB::table('section_teacher')->where('teacher_id', $teacher)->pluck('section_id');
        $sections = $this->sectionModel::whereIn('id', $sectionId)->get();
        // dd($sections);
        return view('Teachers.dashboard.sections', compact('sections'));
    }
    public function store(AddAttendanceRequest $request)
    {
        try {
            //here i need the student id to store in the table
            foreach ($request->attendances as $studentId => $attendance) {
                if ($attendance == 'attendant') {
                    $attendantStatus = true;
                } else {
                    $attendantStatus = false;
                }
                ///['student_id'=> $studentId] : this here is getting the id of the student needed to be updated,in case of updating
                //incase the attendnace date not equal to the current date then create otherwise update
                $this->attendanceModel::updateOrcreate(['student_id' => $studentId, 'attendance_date' => date('y-m-d')], [
                    'student_id' => $studentId,
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'teacher_id' => 2,
                    'attendance_status' => $attendantStatus,
                    'attendance_date' => date('y-m-d')
                ]);
            }


            toastr()->success(trans('messages.success'));
            return redirect()->route('students.names');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {

            //here i need the student id to store in the table
            $studentId = $this->attendanceModel::where([['attendance_date', date('y-m-d')], ['student_id', $request->student_id]])->first();
            if ($request->attendances == 'attendant') {
                $attendantStatus = true;
            } elseif ($request->attendances == 'absent') {
                $attendantStatus = false;
            }
            $studentId->update([
                'attendance_status' => $attendantStatus,
            ]);



            toastr()->success(trans('messages.success'));
            return redirect()->route('students.names');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getAttendanceReports()
    {
        $teacher = auth()->user()->id;
        $sections = DB::table('section_teacher')->where('teacher_id', $teacher)->pluck('section_id');
        $students = $this->studentModel::whereIn('section_id', $sections)->get();
        return view('Teachers.dashboard.attendanceReports', compact('students'));
    }

    public function searchAttendance(Request $request)
    {

        $request->validate(
            [
                'from' => 'required|date|date_format:Y-m-d',
                'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
            ],
            [
                'from.date_format' => trans('validation.date_format'),
                'to.date_format' =>    trans('validation.date_format'),
                'to.after_or_equal' => trans('validation.after_or_equal'),


            ]
        );

        //here i need the students coz i want the select returning with me after executing the query
        $teacher = auth()->user()->id;
        $sections = DB::table('section_teacher')->where('teacher_id', $teacher)->pluck('section_id');
        $students = $this->studentModel::whereIn('section_id', $sections)->get();

        if ($request->student_id == 'all') {
            $studentsTable = $this->attendanceModel::whereBetween('attendance_date', [$request->from, $request->to])->get();
            return view('Teachers.dashboard.attendanceReports', compact('students', 'studentsTable'));
        } else {
            $studentsTable = $this->attendanceModel::whereBetween('attendance_date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
            return view('Teachers.dashboard.attendanceReports', compact('students', 'studentsTable'));
        }
    }
}
