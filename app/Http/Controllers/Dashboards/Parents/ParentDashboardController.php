<?php

namespace App\Http\Controllers\Dashboards\Parents;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ParentDashboardController extends Controller
{

    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('parents.children', compact('students'));
    }

    public function showResults($studentId)
    {
        $student = Student::findOrFail($studentId);
        if($student->parent_id !== auth()->user()->id) {
            toastr()->error('there is something wrong in student info');
            return redirect()->route('children.index');

        }
        $scores = Score::where('student_id', $studentId)->get();
        if(isEmpty($scores)) {
            toastr()->error('there are no scores for this student');
            return redirect()->route('children.index');

        }
        return view('parents.childrenScores', compact('scores'));


    }

    public function profileIndex()
    {

    }
}
