<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    protected $guarded = [];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function student()
    {
      return  $this->belongsTo(Student::class);
    }

    public function fees()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }


}
