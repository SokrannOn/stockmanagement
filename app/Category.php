<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    public function productlists(){
        return $this->hasMany(Productlist::class);
    }
}
