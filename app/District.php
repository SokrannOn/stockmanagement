<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function communes(){
        return $this->hasMany(Commune::class);
    }
    public  function province(){
        return $this->belongsTo(Province::class);
    }
}
