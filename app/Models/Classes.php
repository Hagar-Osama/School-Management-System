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

}
