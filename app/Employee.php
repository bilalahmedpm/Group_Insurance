<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Legalheir;

class Employee extends Model
{

    public function legalheirs()
    {
        return $this->hasMany(\App\Legalheir::class);
    }
}
