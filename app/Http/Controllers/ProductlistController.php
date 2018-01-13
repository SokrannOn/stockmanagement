<?php

namespace App\Http\Controllers;

use App\Category;
use App\Productlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductlistController extends Controller
{
    public function create()
    {
        $category = Category::pluck('name','id');
        return view('admin.productlists.create',compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'khname'       =>'required',
            'engname'       =>'required',
            'productcode'       =>'required',
            'productbarcode'       =>'required',
            'category_id'       =>'required'
        ],[
            'khname.required' =>'Khmer name required',
            'engname.required' =>'English name required',
            'productcode.required' =>'Product code required',
            'productbarcode.required' =>'Product Barcode required',
            'category_id.required' =>'Category name required'
        ]);

        $productlist = new Productlist();
        $productlist->khname = $request->input('khname');
        $productlist->engname = $request->input('engname');
        $productlist->productcode = $request->input('productcode');
        $productlist->productbarcode = $request->input('productbarcode');
        $productlist->category_id = $request->input('category_id');
        $productlist->user_id = Auth::user()->id;
        $productlist->active = 1;
        $productlist->save();
        return redirect('/admin/productlist/create');
    }
    public function getTableProductlist(){

        $productlist = Productlist::where('active',1)->get();
        return view('admin.productlists.table_productlist_view',compact('productlist'));
    }
    public function delete($id)
    {
        $productlist = Productlist::find($id);
        $productlist->active =0;
        $productlist->save();
        return redirect('/admin/productlist/create');
    }


    public function editProlist($id){

        $productlist = Productlist::findOrFail($id);
        $category = Category::pluck('name','id');
        return view('admin.productlists.editProlist',compact('productlist','category'));
    }
    public function updateProlist(Request $request, $id){
        $this->validate($request,[
            'engname'=>'required',
            'khname'=>'required',
            'productcode'=>'required',
            'productbarcode'=>'required',
            'category_id'=>'required'
        ],[
            'engname.required'=>'English name required',
            'khname.required'=>'Khmer name required',
            'productcode.required'=>'Product code required',
            'productbarcode.required'=>'Product barcode required',
            'category_id.required'=>'Category required'
        ]);

        $productlist = Productlist::findOrFail($id);
        $productlist->engname = trim($request->input('engname'));
        $productlist->khname = trim($request->input('khname'));
        $productlist->productcode = trim($request->input('productcode'));
        $productlist->productbarcode = trim($request->input('productbarcode'));
        $productlist->category_id = trim($request->input('category_id'));
        $productlist->save();
        return redirect()->back();


    }
}
