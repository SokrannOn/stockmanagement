<?php

namespace App\Http\Controllers;

use App\Category;
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
        $purchaseorder = Purchaseorder::all();
        return view('admin.purchaseorders.index',compact('purchaseorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now()->toDateString();
        $customer = Customer::where('active',1)->get();
        $product = Productlist::where('active',1)->get();
        $catInPro = Productlist::select('category_id')->distinct('category_id')->pluck('category_id','category_id');
        $category = Category::whereIn('id',$catInPro)->get();

        return view('admin.purchaseorders.create',compact('now','customer','product','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'customer_id'  =>'required',
        ],[
            'customer_id.required' =>'Customer name required',
        ]);
        $po = new Purchaseorder();
        $po->date = Carbon::now()->toDateString();
        $po->totalAmount = $request->totalAmount;
        $po->grandTotal = $request->grandTotal;
        $po->discount = $request->discount;
        $po->cod = $request->cod;
        $po->customer_id = $request->customer_id;
        $po->user_id = Auth::user()->id;
        $po->isGenerate =0;
        $po->generateBy =0;
        $po->save();
        $tmps = Tmppurchaseorder::where('user_id','=',Auth::user()->id)->get();
        foreach ($tmps as $tmp) {
            $po->productlists()->attach($tmp->productlist_id,
                ['unitPrice'=>$tmp->unitPrice,
                    'qty'=>$tmp->qty,
                    'amount'=>$tmp->amount,
                    'user_id'=>$tmp->user_id]);
        }
        $tmps = Tmppurchaseorder::where('user_id','=',Auth::user()->id)->get();
        foreach ($tmps as $tmp) {
            $tmp->delete();
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = Purchaseorder::find($id);
        return view('admin.purchaseorders.details',compact('details'));
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
        $totalAmount = 0;
        $tmpdata = Tmppurchaseorder::all();
        foreach ($tmpdata as $t){
            $totalAmount = $totalAmount+ $t->amount;
        }
        return view('admin.purchaseorders.showProduct',compact('tmpdata','totalAmount'));
    }
    public function productBuy($id)
    {
        $qty_tmp=0;
        $qty_tmp = Tmppurchaseorder::where('productlist_id','=',$id)->where('user_id','=',Auth::user()->id)->value('qty');
        $product_code = Productlist::where('id','=', $id)->value('productcode');

        $now = Carbon::now()->toDateString();
        $now1 = Carbon::now();
        $addyear =$now1->addYear()->toDateString();
        $qty_po_ordered = 0;
        $qtyOrdered =0;
        $qty_in_stock=0;
        $qtyAval=0;
        $price=0;
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
        $qtyOrdered = $qty_tmp+$qty_po_ordered;
        $qtyAval = $qty_in_stock-$qtyOrdered;
        return view('admin.purchaseorders.buy',compact('qtyAval','id','price'));
    }
    public function addOrder($id,$price,$qty)
    {
        $qty_tmp = Tmppurchaseorder::where('productlist_id','=',$id)->where('user_id','=',Auth::user()->id)->value('qty');
        if($qty_tmp){
            $new_qty = $qty_tmp+$qty;
            $a = $new_qty * $price;
            $amount = round ( $a, 2, PHP_ROUND_HALF_UP);
            DB::table('tmppurchaseorders')->where('productlist_id',$id)->update(['qty'=>$new_qty,'amount'=>$amount]);
        }else{
            $a = $qty * $price;
            $amount = round ( $a, 2, PHP_ROUND_HALF_UP);
            $tmp = new Tmppurchaseorder();
            $tmp->productlist_id = $id;
            $tmp->qty = $qty;
            $tmp->unitPrice = $price;
            $tmp->amount = $amount;
            $tmp->user_id = Auth::user()->id;
            $tmp->save();
        }
        $tmp = Tmppurchaseorder::where('user_id',Auth::user()->id)->get();
        return response()->json(['tmp'=>$tmp]);
    }
    public function removeProduct($id)
    {
        $tmp = Tmppurchaseorder::find($id);
        $tmp->delete();
    }
}
