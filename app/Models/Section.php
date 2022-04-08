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
}
