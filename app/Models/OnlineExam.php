<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OnlineExam extends Model
{
    use HasTranslations;
    protected $fillable = ['name','subject_id', 'teacher_id', 'grade_id', 'class_id', 'section_id'];
    public $translatable = ['name'];

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
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

    public function questions()
    {
        return $this->hasMany(Question::class, 'online_exam_id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'online_exam_id');
    }
}
