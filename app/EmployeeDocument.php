<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    public function employee()
    {
        return $this->belongsTo(\App\Employee::class);
    }
}
