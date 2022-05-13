<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AttendanceInterface;
use App\Http\Traits\GradesTraits;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use Exception;

class AttendanceRepository implements AttendanceInterface
{
    private $attendanceModel;
    private $gradesModel;
    private $studentModel;


    public function __construct(Attendance $attendance, Grade $grade, Student $student)
    {
        $this->attendanceModel = $attendance;
        $this->gradesModel = $grade;
        $this->studentModel = $student;
    }

    public function index()
    {
        $grades = $this->gradesModel::with('sections')->get();
        return view('Attendance.sections', compact('grades'));
    }

    public function create($sectionId)
    {
        $students = $this->studentModel::with('attendances')->where('section_id', $sectionId)->get();
        return view('Attendance.create', compact('students'));
    }

    public function store($request)
    {
        try {
            //here i need the student id to store in the table
            foreach($request->attendances as $studentId => $attendance) {
                if($attendance == 'attendant') {
                    $attendantStatus = true;
                }else {
                    $attendantStatus = false;
                }
                $this->attendanceModel::create([
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
            return redirect()->route('attendance.create', $request->section_id);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
