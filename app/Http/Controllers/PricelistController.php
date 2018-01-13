<?php

namespace App\Http\Controllers;

use App\Pricelist;
use App\Productlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricelistController extends Controller
{
    public function create()
    {
        $product = Productlist::where('active','=',1)->pluck('khname','id');
        return view('admin.pricelists.create',compact('product'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'       =>'required',
            'fobprice'       =>'required',
            'margin'       =>'required',
            'landingprice'       =>'required',
            'sellingprice'       =>'required',
            'startdate'       =>'required',
            'enddate'       =>'required'
        ],[
            'product_id.required' =>'Product name required',
            'fobprice.required' =>'Fob price required',
            'margin.required' =>'Margin required',
            'landingprice.required' =>'Landing price required',
            'sellingprice.required' =>'Selling price required',
            'startdate.required' =>'Begin date required',
            'enddate.required' =>'End date required'
        ]);

        $pricelist = new Pricelist();
        $pricelist->product_id = $request->input('product_id');
        $pricelist->fobprice = trim($request->input('fobprice'));
        $pricelist->margin = trim($request->input('margin'));
        $pricelist->landingprice = trim($request->input('landingprice'));
        $pricelist->sellingprice = trim($request->input('sellingprice'));
        $pricelist->startdate = $request->input('startdate');
        $pricelist->enddate = $request->input('enddate');
        $pricelist->user_id = Auth::user()->id;
        $pricelist->active = 1;
        $pricelist->save();
        return redirect('/admin/pricelist/create');
    }
    public function getTabalePricelist(){

        $pricelist = Pricelist::where('active',1)->get();
        return view('admin.pricelists.table_pricelist_view',compact('pricelist'));
    }
    public function delete($id)
    {
        $pricelist = Pricelist::find($id);
        $pricelist->active =0;
        $pricelist->save();
        return redirect('/admin/pricelist/create');
    }
    public function edit($id){

        $pricelist = Pricelist::findOrFail($id);
        $product = Productlist::where('active',1)->pluck('khname','id');
        return view('admin.pricelists.edit',compact('pricelist','product'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'product_id'       =>'required',
            'fobprice'       =>'required',
            'margin'       =>'required',
            'landingprice'       =>'required',
            'sellingprice'       =>'required',
            'startdate'       =>'required',
            'enddate'       =>'required'
        ],[
            'product_id.required' =>'Product name required',
            'fobprice.required' =>'Fob price required',
            'margin.required' =>'Margin required',
            'landingprice.required' =>'Landing price required',
            'sellingprice.required' =>'Selling price required',
            'startdate.required' =>'Begin date required',
            'enddate.required' =>'End date required'
        ]);

        $pricelist = Pricelist::findOrFail($id);
        $pricelist->product_id = $request->input('product_id');
        $pricelist->fobprice = trim($request->input('fobprice'));
        $pricelist->margin = trim($request->input('margin'));
        $pricelist->landingprice = trim($request->input('landingprice'));
        $pricelist->sellingprice = trim($request->input('sellingprice'));
        $pricelist->startdate = $request->input('startdate');
        $pricelist->enddate = $request->input('enddate');
        $pricelist->user_id = Auth::user()->id;
        $pricelist->active = 1;
        $pricelist->save();
        return redirect()->back();


    }
}
