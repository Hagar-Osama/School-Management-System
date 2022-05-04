<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpgradeStudent extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function fromGrade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }

    public function fromClass()
    {
        return $this->belongsTo(Classes::class, 'from_class');
    }

    public function fromSection()
    {
        return $this->belongsTo(Section::class, 'from_section');
    }

    public function toGrade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }

    public function toClass()
    {
        return $this->belongsTo(Classes::class, 'to_class');
    }

    public function toSection()
    {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
