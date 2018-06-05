<?php

namespace App\Http\Controllers;
use App\Createdefault;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){

<<<<<<< HEAD
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
            $data = ['Administrator','Stockmanagement','Purchaseorder','Account'];
            foreach ($data as $d){
                $m = new  Module();
                $m->module= $d;
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




=======
        Createdefault::create();
>>>>>>> 9af9289cf0d39c8e4d4fe5509a5aadc18a42d81c
        if(Auth::check()){
            return view(' admin.dashboard');
        }
        return redirect('login');
    }

    public function AdminPanel(){
        return view('admin.dashboard');
    }

    public function changePassword(){
        return view('admin.users.changePassword');
    }

    public function changedPass(Request $request){
        $this->validate($request,[
            'password'      =>'required',
            'confirm_pass'  =>'required',
        ],[

            'password.required'     =>'field password required',
            'confirm_pass.required' =>'field confirm password required',
        ]);
        $user= User::find(Auth::user()->id);
        $user->logged =1;
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/admin');
    }


}
