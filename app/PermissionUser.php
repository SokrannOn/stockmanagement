<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class PermissionUser
{


    public function pUser(){
        $data= [];
        $user = User::find(Auth::user()->id);
        $permission = $user->role->permissions;
        foreach ($permission as $p){
            $data[$p->permission_id] = $p->permission_id;
        }
        if(count($permission)){
            return $data;
        }else{
            return $data;
        }
    }

    public static function create(){
        $obj = new PermissionUser();
        $ar = $obj->pUser();
        if(array_key_exists(1,$ar)){
            return true;
        }else{
            return false;
        }

    }

    public static function edit(){
        $obj = new PermissionUser();
        $ar = $obj->pUser();
        if(array_key_exists(2,$ar)){
            return true;
        }else{
            return false;
        }
    }

    public static function view(){

        $obj = new PermissionUser();
        $ar = $obj->pUser();
        if(array_key_exists(3,$ar)){
            return true;
        }else{
            return false;
        }
    }

    public static function delete(){
        $obj = new PermissionUser();
        $ar = $obj->pUser();
        if(array_key_exists(4,$ar)){
            return true;
        }else{
            return false;
        }
    }





}
