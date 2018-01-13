<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    //

    public function supplies(){
        return $this->belongs(Supply::class);
    }

    public function productlists(){
        return $this->belongsToMany(Productlist::class)->withTimestamps()->withPivot('productlist_id','qty','landinprice','mdf','expd');
    }
}
