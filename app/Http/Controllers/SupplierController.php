<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {

        $supplier = Supply::where('active',1)->get();
        return view('admin.supplier.viewsupplier',compact('supplier'));
    }


    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:supplies',
            'contact'=>'required|numeric',
            'address'=>'required',

        ],[
            'name.required'=>'Name required',
            'email.required'=>'Email required',
            'email.unique'=>'Email existed',
            'contact.required'=>'Contact required',
            'address.required'=>'Address required',
        ]);

        $su = new Supply();
        $su->name = trim($request->input('name'));
        $su->email = trim($request->input('email'));
        $su->contactnumber = trim($request->input('contact'));
        $su->address = trim($request->input('address'));
        $su->user_id = Auth::user()->id;
        $su->active = 1;
        $su->save();

        return redirect()->back();






    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
