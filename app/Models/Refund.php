<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $guarded = [];

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
