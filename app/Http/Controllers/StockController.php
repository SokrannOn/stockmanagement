<?php

namespace App\Http\Controllers;

use App\Productlist;
use App\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{

    public function index()
    {
        return view('admin.stockin.viewproducts');
    }


    public function create()
    {
        $su  = Supply::where('active',1)->pluck('name','id');
        $pro = Productlist::where('active',1)->pluck('khname','id');
        return view('admin.stockin.create',compact('su','pro'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'qty'               =>'required',
            'invdate'           =>'required',
            'invnum'            =>'required',
            'supplier'          =>'required',
            'mfd'               =>'required',
            'expd'              =>'required',
            'product'           =>'required'
        ],[
            'qty.required'               =>' Quantities required',
            'invdate.required'           =>'Invoice date required',
            'invnum.required'            =>'Invoice number required',
            'supplier.required'          =>'supplier required',
            'mfd.required'               =>'Manufacture date required',
            'expd.required'              =>'expired date required',
            'product.required'           =>'product required'
        ]);

        $userid         = Auth::user()->id;
        $importdate     = Carbon::now()->toDateString();
        $qty            = $request->input('qty');
        $invdate        = $request->input('invdate');
        $invnum         = $request->input('invnum');
        $supplier       = $request->input('supplier');
        $mfd            = $request->input('mfd');
        $expd           = $request->input('expd');
        $product        = $request->input('product');
        $dis            =$request->input('dis');

        if($request->session()->get('imports')){
            $imports =[$importdate,$invnum,$invdate,$supplier,0,$dis,$userid];
            $request->session()->pull('imports',$imports);
        }

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
