<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function legals()
    {
        return $this->hasMany(\App\Legalheir::class);
    }
    public function documents()
    {
        return $this->hasMany(\App\EmployeeDocument::class);
    }
    public function designation()
    {
        return $this->belongsTo(\App\Designation::class);
    }
    public function department()
    {
        return $this->belongsTo(\App\Department::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    public function banks()
    {
        return $this->belongsToMany(Bank::class, 'bank_employees');
    }

}
