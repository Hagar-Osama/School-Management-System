<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineMeeting extends Model
{
    protected $fillable = ['grade_id', 'class_id', 'section_id', 'user_id', 'topic', 'meeting_id', 'duration', 'start_at', 'start_url', 'join_url', 'password', 'integeration'];

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
