<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tmppurchaseorder extends Model
{
    public  function productlist(){
        return $this->belongsTo(Productlist::class);
    }
}
