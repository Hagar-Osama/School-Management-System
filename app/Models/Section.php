<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name','status', 'grade_id', 'class_id' ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
