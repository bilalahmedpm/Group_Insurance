<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function employee()
    {
        return $this->hasMany(\App\Employee::class);
    }
}
