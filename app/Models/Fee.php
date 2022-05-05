<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasTranslations;
    protected $fillable = ['title', 'amount', 'grade_id', 'class_id', 'description', 'year'];
    public $translatable = ['title'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
