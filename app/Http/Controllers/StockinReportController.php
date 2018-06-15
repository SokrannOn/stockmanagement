<?php

namespace App\Http\Controllers;

use App\Historyimport;
use App\Import;
use App\PermissionUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockinReportController extends Controller
{
    public function index()
    {
        if(PermissionUser::create()) {
            return view('admin.reports.stockin.stockin');
        }else{
            return view('admin.error.permission');
        }

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->ajax()){
            $end = $request->end;
            $start = $request->start;
            $im = Historyimport::whereBetween('date',[$start,$end])->get();
            return view('admin.reports.stockin.content',compact('im','start','end'));

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
