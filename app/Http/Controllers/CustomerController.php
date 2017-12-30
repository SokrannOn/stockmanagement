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
        dd($request->all());
    }
    public function getTableCustomerlist()
    {
        $customer = Customer::where('active',1)->get();
        return view('admin.productlists.table_customerlist_view',compact('customer'));
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
