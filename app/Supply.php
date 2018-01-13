<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //

    public function imports(){
        return $this->hasMany(Import::class);
    }
}
