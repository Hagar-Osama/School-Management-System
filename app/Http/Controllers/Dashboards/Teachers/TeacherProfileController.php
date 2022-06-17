<?php

namespace App\Http\Controllers\Dashboards\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Traits\TeachersTraits;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    private $teacherModel;
    use TeachersTraits;


    public function __construct(Teacher $teacher)
    {
        $this->teacherModel = $teacher;
     ;
    }
    public function index()
    {
        $information = $this->getTeacherById(auth()->user()->id);
        return view('Teachers.Dashboard.profile', compact('information'));

    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);
        $teacher = $this->getTeacherById($id);
        if(! empty($request->password)) {
            $teacher->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'password' => Hash::make($request->password)
            ]);
        }else {
            $teacher->update([
                'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            ]);
        }
        toastr()->success(trans('messages.update'));
        return redirect()->back();


    }
}
