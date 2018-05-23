<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','active',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
       return $this->belongsTo(Role::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function modules(){
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

}
