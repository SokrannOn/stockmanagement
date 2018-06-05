<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historyimport extends Model
{

    public function import(){
        return $this->belongsTo(Import::class);
    }

    public function productlist(){
        return $this->belongsTo(Productlist::class);
    }

}
