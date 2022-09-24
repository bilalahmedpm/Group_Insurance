<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Legalheir extends Model
{
    public function employee()
    {
        return $this->belongsTo(\App\Employee::class);
    }
    public function bank()
    {
        return $this->belongsTo(\App\Bank::class);
    }
    public function branch()
    {
        return $this->belongsTo(\App\Branches::class);
    }

    public function relation()
    {
        return $this->belongsTo(\App\Relation::class);
    }

}
