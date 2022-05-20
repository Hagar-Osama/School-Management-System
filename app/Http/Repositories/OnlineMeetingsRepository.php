<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\OnlineMeetingsInterface;
use App\Http\Traits\GradesTraits;
use App\Http\Traits\OnlineMeetingsTraits;
use App\Models\Grade;
use App\Models\OnlineMeeting;
use Exception;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineMeetingsRepository implements OnlineMeetingsInterface
{
    private $meetingModel;
    private $gradesModel;
    use GradesTraits;
    use OnlineMeetingsTraits;



    public function __construct(OnlineMeeting $meeting, Grade $grade)
    {
        $this->meetingModel = $meeting;
        $this->gradesModel = $grade;
    }

    public function index()
    {
        $meetings = $this->getAllMeetings();
        return view('Meetings.index', compact('meetings'));
    }

    public function create()
    {
        $grades = $this->getAllGrades();
        return view('Meetings.create', compact('grades'));
    }

    public function makeMeeting()
    {
        $grades = $this->getAllGrades();
        return view('Meetings.multipleMeetings', compact('grades'));
    }

    public function store($request)
    {

        try {
            //first we get the first user
            $user = Zoom::user()->first();
            //then make the meeting
            $meeting = Zoom::meeting()->make([
                'topic' => $request->topic,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_time' => $request->start_time,
                'time_zone' => 'Africa/Cairo', //or config('zoom.timezone)
            ]);
            //then set our perfered setting
            $meeting->settings()->make([
                'join_before_host' => false,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => true,
                'waiting_room' => true,
                'approval_type' => config('zoom.approval_type'),
                'audio' => config('zoom.audio'),
                'auto_recording' => config('zoom.auto_recording')
            ]);
            $user->meetings()->save($meeting);
            $this->meetingModel::create([
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'topic' => $request->topic,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_at' => $request->start_time,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
                'meeting_id' => $meeting->id,
                'integeration' => true

            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('onlineMeetings.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeMeeting($request)
    {

        try {

            $this->meetingModel::create([
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'topic' => $request->topic,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_at' => $request->start_time,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
                'meeting_id' => $request->meeting_id,
                'integeration' => false
            ]);

            toastr()->success(trans('messages.success'));
            return redirect(route('onlineMeetings.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request)
    {
        try {

            $meeting = $this->getMeetingById($request->id);
            if ($meeting->integeration == true) {
                //first we delete it from zoom website
                $zoom = Zoom::meeting()->find($request->meeting_id);
                $zoom->delete();
                //then delete it from database
                $onlineMeeting = $this->meetingModel::where('meeting_id', $request->meeting_id);
                $onlineMeeting->delete();
            } else {
                $meeting->delete();
            }

            toastr()->error(trans('messages.delete'));
            return redirect(route('onlineMeetings.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
