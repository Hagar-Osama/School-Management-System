<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer', 'score', 'right_answer', 'online_exam_id'];

    public function onlineExam()
    {
        return $this->belongsTo(OnlineExam::class, 'online_exam_id');
    }
}
