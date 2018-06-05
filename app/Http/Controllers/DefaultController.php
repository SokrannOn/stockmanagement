<?php

namespace App\Http\Controllers;
use App\Createdefault;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){

        Createdefault::create();
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
