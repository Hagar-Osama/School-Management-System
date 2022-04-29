<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasTranslations;
    protected $fillable = ['name','status', 'grade_id', 'class_id' ];

    public $timestamps = true;
    public $translatable = ['name'];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function upgradedtudents()
    {
        return $this->hasMany(UpgradeStudent::class, 'from_section');
    }

    public function newUpgradedtudents()
    {
        return $this->hasMany(UpgradeStudent::class, 'to_section');
    }
}
