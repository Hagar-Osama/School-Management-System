<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
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
}
