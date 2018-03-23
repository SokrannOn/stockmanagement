<?php

namespace App\Http\Controllers;
use App\Addproduct;
use App\Addsession;
use App\Import;
use App\Pricelist;
use App\Productlist;
use App\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{

    public function index(Request $request)
    {
        $stockin =$request->session()->get('stockin');
        return view('admin.stockin.viewproducts',compact('stockin'));
    }


    public function create()
    {
        $su  = Supply::where('active',1)->pluck('name','id');
        $pro = Productlist::where('active',1)->pluck('khname','id');
        return view('admin.stockin.create',compact('su','pro'));
    }


    public function store(Request $request)
    {
//
//            $this->validate($request,[
//                'invdate'           =>'required',
//                'invnum'            =>'required',
//                'supplier'          =>'required',
//            ],[
//                'invdate.required'           =>'Invoice date required',
//                'invnum.required'            =>'Invoice number required',
//                'supplier.required'          =>'supplier required',
//            ]);
            $userid         = Auth::user()->id;
            $importdate     = Carbon::now()->toDateString();
            $invdate        = $request->input('invdate');
            $invnum         = $request->input('invnum');
            $supplier       = $request->input('supplier');
            $now = Carbon::now()->toDateString();
            $im = new Import();
            $im->importdate  = Carbon::now()->toDateString();
            $im->invnumber   = trim($invnum);
            $im->invdate     = $invdate;
            $im->supply_id   = $supplier;
            $im->totalAmount = 0;
            $im->discount    = $request->input('dis');
            $im->user_id     = $userid;
            $im->save();
            $stockin =$request->session()->get('stockin');
            foreach ($stockin as $s){
                $pricelist = Pricelist::where([['productlist_id',$s['productid']],['startdate','<=',$now],['enddate','>=',$now],])->value('landingprice');
                $im->productlists()->attach($s['productid'],['qty'=>$s['qty'],'landinprice'=>0,'mdf'=>$s['mfd'],'expd'=>$s['expd']]);
            }
            $request->session()->forget('stockin');

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

    public function addProduct(Request $request,$mfd,$expd,$dis,$productId,$qty){

            $stockin[$productId]=[
                    'productid'=>$productId,
                    'mfd'=>$mfd,
                    'expd'=>$expd,
                    'qty'=>$qty
            ];
            $data = $request->session()->get('stockin');
            if($data){
                if(array_key_exists($productId,$data)){

                    $old = $data[$productId]['qty']; //get old qty
                    $updateQty = (int)$old+ (int)$qty;//make a new value qty
                    $new = array('qty'=>$updateQty); // stored a new qty in array to replace
                    $replace = array_replace($data[$productId],$new); // replace a new value into array
                    unset($data[$productId]);//delete index of array exist
                    $updateProduct[$productId]=$replace; //make a new array after replace
                    $a = $data+$updateProduct; // make array like default
                    $request->session()->forget('stockin'); //deleted session stock in
                    $request->session()->put('stockin',$a); // make a new session stock in

                }else{
                    $request->session()->put('stockin',$data+$stockin);
                }
            }else{
                $request->session()->put('stockin',$stockin);
            }
    }
}
