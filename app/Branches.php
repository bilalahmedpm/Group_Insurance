<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

}
