<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function create()
    {
        $category = Category::where('active',1)->get();
        return view('admin.categories.create',compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'description'   =>'required'
        ],[
            'name.required' =>'Category name required',
            'description.required' =>'Description required'
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->user_id = Auth::user()->id;
        $category->active = 1;
        $category->save();
        return redirect()->route('category.create');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->active =0;
        $category->save();
        return redirect()->route('category.create');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
    }
    public function update(Request $request, $id){
            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();
            return redirect()->route('category.create');
    }
}
