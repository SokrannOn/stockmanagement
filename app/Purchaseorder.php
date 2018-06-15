<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaseorder extends Model
{
    public function productlists(){
        return $this->belongsToMany(Productlist::class)->withTimestamps()->withPivot('productlist_id','qty','unitPrice','amount','user_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
