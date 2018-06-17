<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function purchaseorder()
    {
        return $this->belongsTo(Purchaseorder::class);
    }
}
