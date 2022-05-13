<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AttendanceInterface;
use App\Http\Requests\AddAttendanceRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $attendanceInterface;

    public function __construct(AttendanceInterface $attendanceInterface)
    {
        $this->attendanceInterface = $attendanceInterface;
    }

    public function index()
    {
        return $this->attendanceInterface->index();

    }

    public function create($sectionId)
    {
        return $this->attendanceInterface->create($sectionId);

    }

    public function store(AddAttendanceRequest $request)
    {
        return $this->attendanceInterface->store($request);
    }
}
