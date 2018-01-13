<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productlist extends Model
{
    //


    public function imports(){
        return $this->belongsToMany(Import::class)->withTimestamps()->withPivot('productlist_id','qty','landinprice','mdf','expd');
    }

    public  function category(){
        return $this->belongsTo(Category::class);
    }
    public function pricelists(){
        return $this->hasMany(Pricelist::class,'	product_id');
    }
}
