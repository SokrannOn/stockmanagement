<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaseorder extends Model
{
    public function productlists(){
        return $this->belongsToMany(Productlist::class)->withTimestamps()->withPivot('productlist_id','qty','unitPrice','amount','user_id');
    }
}
