<?php
namespace App\Http\Traits;

trait OnlineMeetingsTraits {
    public function getAllMeetings()
    {
        return $this->meetingModel::get();
    }

    public function getMeetingById($meetingId)
    {
        return $this->meetingModel::findOrFail($meetingId);
    }

}
