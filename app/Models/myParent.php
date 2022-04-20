<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class myParent extends Model
{
    use HasTranslations;
    protected $guarded = [];

    public $translatable = ['father_name', 'mother_name', 'father_job', 'mother_job'];
    protected $table = 'parents';

    public function parentAttachments()
    {
        return $this->hasMany(ParentAttachment::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
