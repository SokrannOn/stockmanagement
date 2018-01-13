<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Commune;
use App\Customer;
use App\District;
use App\Province;
use App\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function create()
    {
        $channel = Channel::pluck('name','id');
        $province = Province::pluck('name','id');
        $district = District::pluck('name','id');
        $commune = Commune::pluck('name','id');
        $village = Village::pluck('name','id');
        return view('admin.customers.create',compact('channel','province','district','commune','village'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'khname'          =>'required',
            'engname'      =>'required',
            'contact'         =>'required',
            'province_id'      =>'required',
            'district_id'  =>'required',
            'commune_id'          =>'required',
            'village_id'      =>'required',
            'channel_id'      =>'required'
        ],[
            'khname.required'         =>'Khmer name required',
            'engname.required'     =>'English name required',
            'contact.required'        =>'Contact required',
            'province_id.required'  =>'Please choose one province',
            'district_id.required'         =>'Please choose one district',
            'commune_id.required'     =>'Please choose on commune',
            'village_id.required'     =>'Please choose on village',
            'channel_id.required'        =>'Please choose on channel name'
        ]);
        $user = new Customer();
        $user->khname      = trim($request->input('khname'));
        $user->engname  = trim($request->input('engname'));
        $user->contact         = trim($request->input('contact'));
        $user->province_id     = $request->input('province_id');
        $user->district_id        = $request->input('district_id');
        $user->commune_id     = $request->input('commune_id');
        $user->village_id        = $request->input('village_id');
        $user->homeno        = trim($request->input('homeno'));
        $user->streetno        = trim($request->input('streetno'));
        $user->channel_id        = $request->input('channel_id');
        $user->user_id       = Auth::user()->id;
        $user->active       =1;
        $user->save();

        return redirect()->back();
    }
    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->active =0;
        $customer->save();
        return redirect('/admin/customer/create');
    }
    public function editCustomer($id){
        $customer = Customer::findOrFail($id);
        $province = Province::pluck('name','id');
        $district = District::pluck('name','id');
        $commune = Commune::pluck('name','id');
        $village = Village::pluck('name','id');
        $channel = Channel::pluck('name','id');
        return view('admin.customers.edit',compact('customer','province','district','commune','village','channel'));
    }
    public function updateCustomer(Request $request, $id){
        $this->validate($request,[
            'khname'          =>'required',
            'engname'      =>'required',
            'contact'         =>'required',
            'province_id'      =>'required',
            'district_id'  =>'required',
            'commune_id'          =>'required',
            'village_id'      =>'required',
            'channel_id'      =>'required'
        ],[
            'khname.required'         =>'Khmer name required',
            'engname.required'     =>'English name required',
            'contact.required'        =>'Contact required',
            'province_id.required'  =>'Please choose one province',
            'district_id.required'         =>'Please choose one district',
            'commune_id.required'     =>'Please choose on commune',
            'village_id.required'     =>'Please choose on village',
            'channel_id.required'        =>'Please choose on channel name'
        ]);
        $user = Customer::findOrFail($id);
        $user->khname      = trim($request->input('khname'));
        $user->engname  = trim($request->input('engname'));
        $user->contact         = trim($request->input('contact'));
        $user->province_id     = $request->input('province_id');
        $user->district_id        = $request->input('district_id');
        $user->commune_id     = $request->input('commune_id');
        $user->village_id        = $request->input('village_id');
        $user->homeno        = trim($request->input('homeno'));
        $user->streetno        = trim($request->input('streetno'));
        $user->channel_id        = $request->input('channel_id');
        $user->user_id       = Auth::user()->id;
        $user->save();
        return redirect()->back();
    }
    public function viewCustomer($id){
        $customer = Customer::findOrFail($id);
        return view('admin.customers.view',compact('customer'));
    }
    public function getTableCustomerlist()
    {
        $customer = Customer::where('active',1)->get();
        return view('admin.customers.table_customer_view',compact('customer'));
    }
    //Province
    public function createProvince($name)
    {
        $p = new Province;
        $p->name = $name;
        $p->user_id = Auth::user()->id;
        $p->save();
        $r = Province::all();
        return response()->json($r);
    }
    public function selectProvince()
    {
        $p = Province::all();
        return response()->json($p);
    }
    public function getDistrict($id)
    {
        $district = DB::table('districts')->select('id','name')->where('province_id','=', $id)->get();
        return response()->json($district);
    }
    //District
    public function createDistrict($name, $province_id)
    {
        $d = new District();
        $d->name = $name;
        $d->province_id = $province_id;
        $d->user_id = Auth::user()->id;
        $d->save();
        $r = District::all();
        return response()->json($r);
    }
    public function selectDistrict($province_id)
    {
        $d = District::where('province_id','=',$province_id)->get();
        return response()->json($d);
    }
    public function getCommune($id)
    {
        $commune = DB::table('communes')->select('id','name')->where('district_id','=', $id)->get();
        return response()->json($commune);
    }

    //Commune
    public function createCommune($name, $district_id)
    {
        $c = new Commune();
        $c->name = $name;
        $c->district_id = $district_id;
        $c->user_id = Auth::user()->id;
        $c->save();
        $r = Commune::all();
        return response()->json($r);
    }
    public function selectCommune($district_id)
    {
        $c = Commune::where('district_id','=',$district_id)->get();
        return response()->json($c);
    }
    public function getVillage($id)
    {
        $village = DB::table('villages')->select('id','name')->where('commune_id','=', $id)->get();
        return response()->json($village);
    }
    //village
    public function createVillage($name, $commune_id)
    {
        $v = new Village();
        $v->name = $name;
        $v->commune_id = $commune_id;
        $v->user_id = Auth::user()->id;
        $v->save();
        $r = Village::all();
        return response()->json($r);
    }
    public function selectVillage($commune_id)
    {
        $v = Village::where('commune_id','=',$commune_id)->get();
        return response()->json($v);
    }
}
