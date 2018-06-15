<?php

namespace App;


class Createdefault {

    public static function create()
    {
        $role = Role::all();
        if(!count($role)){

            $Role = new Role();
            $Role->name = "Admin";
            $Role->description="Administrator";
            $Role->user_id=1;
            $Role->save();
        }
        $permission = Permission::all();
        if(!count($permission)){
            $data = ['create','edit','view','delete'];
            $i=1;
            foreach ($data as $d){
                $pe = new Permission();
                $pe->permission_id = $i++;
                $pe->name = $d;
                $pe->save();
            }
        }

        $module = Module::all();
        if(!count($module)){
            $data = ['Administrator','Stockmanagement','Purchaseorder','Reports'];
            foreach ($data as $da){
                $m = new  Module();
                $m->module= $da;
                $m->save();
            }

        }
        $position = Position::all();
        if(!count($position)){
            $pos = new Position();
            $pos->name = "Administrator";
            $pos->description="Administrator";
            $pos->user_id=1;
            $pos->save();
        }

        $user = User::all();
        if(!count($user)){
            $users = new User();
            $users->role_id=1;
            $users->position_id=1;
            $users->name="Administrator";
            $users->username="Administrator";
            $users->email="Admin@gmail.com";
            $users->password=bcrypt('admin');
            $users->photo="default_user.png";
            $users->active=1;
            $users->logged =1;
            $users->save();
            $moduleId = [1,2,3];
            $users->modules()->attach($moduleId);


        }

    }
}
