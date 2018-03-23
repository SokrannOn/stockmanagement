<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    public  function productlist(){
        return $this->belongsTo(Productlist::class);
    }
}
