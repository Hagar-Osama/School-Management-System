<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasTranslations;
    protected $fillable = ['subject_id', 'semester', 'academic_year'];
    public $translatable = ['semester'];

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
