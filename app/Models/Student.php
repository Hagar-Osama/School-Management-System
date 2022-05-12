<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use SoftDeletes;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];

    public function Parent()
    {
        return $this->belongsTo(myParent::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function upgradedStudent()
    {
        return $this->hasMany(UpgradeStudent::class, 'student_id');
    }

    public function feeInvoices()
    {
        return $this->hasMany(FeeInvoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function studentAccount()
    {
        return $this->hasMany(StudentAccount::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function studentRefund()
    {
        return $this->hasMany(StudentRefund::class);
    }
}
