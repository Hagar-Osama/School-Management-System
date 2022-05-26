<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['name'];


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }

    public function onlineExam()
    {
        return $this->hasMany(OnlineExam::class, 'teacher_id');
    }
}
