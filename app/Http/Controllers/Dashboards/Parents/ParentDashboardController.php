<?php

namespace App\Http\Controllers\Dashboards\Parents;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\FeeInvoice;
use App\Models\Refund;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ParentDashboardController extends Controller
{
    private $studentModel;
    private $attendanceModel;

    public function __construct(Student $student, Attendance $attendance)
    {
        $this->studentModel = $student;
        $this->attendanceModel = $attendance;

    }

    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children', compact('students'));
    }

    public function showResults($studentId)
    {
        $student = Student::findOrFail($studentId);
        if ($student->parent_id != auth()->user()->id) {
            toastr()->error('there is something wrong in student info');
            return redirect()->route('children.index');
        }
        $scores = Score::where('student_id', $studentId)->get();
        if (isEmpty($scores)) {
            toastr()->error('there are no scores for this student');
            return redirect()->route('children.index');
        }
        return view('parents.childrenScores', compact('scores'));
    }

    public function showAttendance()
    {
        $studentsTable = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.studentsAttendance', compact('studentsTable'));
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
            return view('parents.studentsAttendance', compact('students', 'studentsTable'));
        } else {
            $studentsTable = $this->attendanceModel::whereBetween('attendance_date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
            return view('parents.studentsAttendance', compact('students', 'studentsTable'));
        }
    }

    public function showFeesInvoices()
    {
        $studentsId = Student::where('parent_id', auth()->user()->id)->pluck('id');
        $feesInvoices = FeeInvoice::whereIn('student_id', $studentsId)->get();
        return view('parents.feesInvoicesIndex', compact('feesInvoices'));


    }

    public function feesInvoicesReceipt($studentId)
    {
        $student = Student::findOrFail($studentId);
        if ($student->parent_id != auth()->user()->id) {
            toastr()->error('there is something wrong in student info');
            return redirect()->route('feesInvoices');
        }
        $refunds = Refund::where('student_id', $studentId)->get();
        if (empty($refunds)) {
            toastr()->error('there are no Refunds for this student');
            return redirect()->route('feesInvoices');
        }
        return view('parents.receipts',compact('refunds'));


    }

    public function profileIndex()
    {
    }
}
