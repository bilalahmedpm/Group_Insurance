<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function branches()
    {
        return $this->hasMany(Branches::class);
    }
    public function legalheirs()
    {
        return $this->hasMany(Legalheir::class);
    }
    
}
