<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    //

    public function supply(){
        return $this->belongsTo(Supply::class);
    }

    public function productlists(){
        return $this->belongsToMany(Productlist::class)->withTimestamps()->withPivot('productlist_id','qty','landinprice','mdf','expd');
    }

    public function historyimports(){
        return $this->hasMany(Historyimport::class);
    }

}
