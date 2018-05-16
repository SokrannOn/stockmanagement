<?php

namespace App\Http\Controllers;

use App\Permission;
use App\PermissionUser;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        $role = Role::all();
        $pe = Permission::pluck('name','id');
        return view('admin.role.index',compact('role','pe'));
    }

    public function createRole(Request $request){

            $this->validate($request,[
                'name'=>'required',
                'permission_id'=>'required'
            ],[
                'name.required'=>'The field name required',
                'permission_id.required'=>'Permission required'
            ]);

            $role = new Role();

            $role->name = trim($request->input('name'));
            $role->user_id= Auth::user()->id;
            $role->save();
            $role->permissions()->attach($request->input('permission_id'));
            return redirect('/role/view');
    }
    public function deleteRole(Request $request, $id){
          $role = Role::find($id);
          $role->delete();
          return redirect('/role/view');
    }
    public function edit($id){
        $role =Role::find($id);
        $per = Permission::pluck('name','id');
        return view('admin.role.popup',compact('role','per'));
    }
    public function updateRole(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'permission_id'=>'required'
        ],[
            'name.required'=>'The field name required',
            'permission_id.required'=>'Permission required'
        ]);
        $role = Role::find($id);
        $role->name=$request->input('name');
        $role->save();
        $role->permissions()->detach();
        $role->permissions()->attach($request->input('permission_id'));
        return redirect('/role/view');

    }


}
