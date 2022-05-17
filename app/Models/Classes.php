<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classes extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'grade_id'];
    public $timestamps = 'true';

    public $translatable = ['name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function upgradedtudents()
    {
        return $this->hasMany(UpgradeStudent::class, 'from_class');
    }

    public function newUpgradedtudents()
    {
        return $this->hasMany(UpgradeStudent::class, 'to_class');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function feeInvoices()
    {
        return $this->hasMany(feeInvoices::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function onlineExam()
    {
        return $this->hasMany(OnlineExam::class, 'class_id');
    }



}
