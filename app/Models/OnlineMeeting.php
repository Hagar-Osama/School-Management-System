<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineMeeting extends Model
{
    protected $fillable = ['grade_id', 'class_id', 'section_id', 'created_by', 'topic', 'meeting_id', 'duration', 'start_at', 'start_url', 'join_url', 'password', 'integeration'];

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

   
}
