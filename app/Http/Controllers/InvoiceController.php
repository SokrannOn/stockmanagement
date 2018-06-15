<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Purchaseorder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function newPo()
    {
        $purchaseorder = Purchaseorder::all();
        return view('admin.invoices.newpo',compact('purchaseorder'));
    }
    public function getGenerateInvoice($id)
    {

        return view('admin.invoices.generate-invoice',compact('id'));
    }
    public function doneGenerateInvoice($id,$r,$d,$v,$due)
    {
        $invoice = new Invoice();
        $invoice->purchaseorder_id = $id;
        $invoice->date = Carbon::now()->toDateString();
        if($due==0){
            $invoice->dueDate = Carbon::now()->toDateString();
        }else{
            $invoice->dueDate = $due;
        }
        $invoice->rate = $r;
        $invoice->deposit = $d;
        $invoice->vat = $v;
        $invoice->printedBy = Auth::user()->id;
        $invoice->isDelivery = 0;
        $invoice->save();
        $invoiceId = $invoice->id;

        $inv = Invoice::find($invoiceId);
        $totalAmount = $inv->purchaseorder->totalAmount;
        $discount = $inv->purchaseorder->discount;
        $cod = $inv->purchaseorder->cod;
        $Vtotal = $totalAmount  - $totalAmount * $discount /100;
        $Vcod =$Vtotal * $cod /100;
        $Vvat = $totalAmount * $v/100;
        $grandTotal = $Vtotal - $Vcod + $Vvat;
        $VgrandTotal = $grandTotal - $d;
        $VgrandTotalk = $VgrandTotal * $r;
        $VgrandTotalkh= (round($VgrandTotalk,0,PHP_ROUND_HALF_UP));

        if(substr($VgrandTotalkh, -2,2)>0){
            $round = 100-substr($VgrandTotalkh, -2,2);
            $totalAmountkh = $VgrandTotalkh+$round;
        }else
        {
            $totalAmountkh = $VgrandTotalkh;
        }
        $printedBy = Auth::user()->id;
        $createdInv = User::where('id','=',$printedBy)->value('name');
        return view('admin.invoices.invoice',compact('inv','cod','r','createdInv','discount','totalAmount','d','Vcod','Vvat','VgrandTotal','totalAmountkh'));
    }
}
