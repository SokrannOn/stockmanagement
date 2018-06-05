<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public  function village(){
        return $this->belongsTo(Village::class);
    }
    public  function channel(){
        return $this->belongsTo(Channel::class);
    }
    public function purchaseorders()
    {
        return $this->hasMany(Purchaseorder::class);
    }
}
