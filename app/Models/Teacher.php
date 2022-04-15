<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
