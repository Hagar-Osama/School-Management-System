<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $guarded = [];
    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function onlineExams()
    {
        return $this->belongsTo(OnlineExam::class, 'online_exam_id');
    }

}
