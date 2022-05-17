<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'grade_id', 'class_id', 'teacher_id'];

    public $translatable = ['name'];

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function exam()
    {
        return $this->hasMany(Exam::class, 'subject_id');
    }

    public function onlineExam()
    {
        return $this->hasMany(OnlineExam::class, 'subject_id');
    }


}
