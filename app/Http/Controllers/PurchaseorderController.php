<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Commune;
use App\Customer;
use App\District;
use App\Productlist;
use App\Province;
use App\Tmppurchaseorder;
use App\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::where('active',1)->get();
        $product = Productlist::where('active',1)->pluck('khname','id');
        return view('admin.purchaseorders.create',compact('customer','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCus()
    {
        $channel = Channel::pluck('name','id');
        $province = Province::pluck('name','id');
        $district = District::pluck('name','id');
        $commune = Commune::pluck('name','id');
        $village = Village::pluck('name','id');
        return view('admin.purchaseorders.addCus',compact('channel','province','district','commune','village'));
    }
    public function getCusInfo($id)
    {
        $customer = Customer::find($id);
        return view('admin.purchaseorders.customerInfo',compact('customer'));
    }
    public function getProductInfo($id)
    {
        $oldQty = Tmppurchaseorder::where('product_id','=',$id)->where('user_id','=',Auth::user()->id)->value('qty');
        $product_code = Product::where('id','=', $id)->value('product_code');
        $qty_product = Product::where('id','=', $id)->value('qty');
        $products = Product::find($id);
        $now = Carbon::now()->toDateString();
        foreach ($products->pricelists as $product) {
            $pricelist_id = $product->id;
            $price = DB::table('pricelists')->where([['id','=',$pricelist_id],['startdate','<=',$now],['enddate','>=',$now],])->value('sellingprice');

        }
        return response()->json(['pro_code'=>$product_code,'qty_product'=>$qty_product,'tmp_pro_qty'=>$oldQty,'price'=>$price]);
    }


}
