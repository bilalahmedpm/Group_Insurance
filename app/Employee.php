<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function legalheirs()
    {
        return $this->hasMany(\App\Legalheir::class);
    }

}
