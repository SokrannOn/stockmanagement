<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Commune;
use App\Customer;
use App\District;
use App\Import;
use App\Productlist;
use App\Province;
use App\Purchaseorder;
use App\Tmppurchaseorder;
use App\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $qty_tmp = Tmppurchaseorder::where('productlist_id','=',$id)->where('user_id','=',Auth::user()->id)->value('qty');
        $product_code = Productlist::where('id','=', $id)->value('productcode');

        $now = Carbon::now()->toDateString();
        $now1 = Carbon::now();
        $addyear =$now1->addYear()->toDateString();
        $qty_po_ordered = 0;
//        $qty_in_stock = DB::table('import_productlist')->where([['productlist_id','=',$id],['expd','>=',$addyear],])->groupBy('productlist_id')->sum('qty');
        $products = Productlist::find($id);
        foreach ($products->purchaseorders as $po) {
            $po_id = $po->id;
            $purchaseorder = Purchaseorder::where('id',$po_id)->where('isGenerate',0)->get();
            foreach ($purchaseorder as $pur){
                $purchaseorder_id = $pur->id;
                $qty_po_ordered =$qty_po_ordered+ DB::table('productlist_purchaseorder')->where([['purchaseorder_id','=',$purchaseorder_id],['productlist_id','=',$id],])->groupBy('productlist_id')->sum('qty');
            }
        }
        foreach ($products->imports as $im) {
            $qty_in_stock = DB::table('import_productlist')->where([['productlist_id','=',$id],['expd','>=',$addyear],])->groupBy('productlist_id')->sum('qty');
        }
        foreach ($products->pricelists as $pri) {
            $pricelist_id = $pri->id;
            $price = DB::table('pricelists')->where([['id','=',$pricelist_id],['startdate','<=',$now],['enddate','>=',$now],])->value('sellingprice');
        }
        return response()->json(['pro_code'=>$product_code,'qty_tmp'=>$qty_tmp,'qty_in_stock'=>$qty_in_stock,'qty_po_ordered'=>$qty_po_ordered,'price'=>$price]);
    }
    public function getShowProduct()
    {
        $tmpdata = Tmppurchaseorder::all();
        return view('admin.purchaseorders.showProduct',compact('tmpdata'));
    }
    public function addOrderProduct($proId,$qty,$price,$amount)
    {
        dd('');
    }

}
