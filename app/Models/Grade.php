<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name', 'notes'
    ];

    public $timestamps = true;
    public $translatable = ['name'];

    public function classes()
    {
        return $this->hasMany(Classes::class);
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
        return $this->hasMany(UpgradeStudent::class, 'from_grade');
    }

    public function newUpgradedtudents()
    {
        return $this->hasMany(UpgradeStudent::class, 'to_grade');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function feeInvoices()
    {
        return $this->hasMany(feeInvoices::class);
    }


}
