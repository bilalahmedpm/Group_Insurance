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

}
