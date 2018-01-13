<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    public  function commune(){
        return $this->belongsTo(Commune::class);
    }
}
