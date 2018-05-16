@extends('admin.master')
@section('content')
    <br>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                Create New Purchase Order
            </div>
            <div class="panel panel-body">
                {!!Form::open(['action'=>'PurchaseorderController@store','method'=>'POST'])!!}
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('customer_id','&nbsp;Customer Name',['class'=>'edit-label']) !!}
                                <div class="input-group">
                                    <select name="customer_id" class="form-control height-35 customerid" style="width: 100%;border-bottom-left-radius: 5px; border-top-left-radius: 5px;" id="customerid">
                                            <option value="0">Please select one</option>
                                        @foreach($customer as $cus)
                                            <option value="{{$cus->id}}">{{$cus->engname . ' | ' .'CAM-CUS-'.sprintf('%06d',$cus->id)}}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                       <button class="btn btn-secondary" data-toggle="modal" data-target="#customer" onclick="addCus()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                    </span>
                                    @if($errors->has('customer_id'))
                                        <span class="text-danger">{{$errors->first('customer_id')}}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="customerInfo">

                    </div>

                    <div class="panel panel-footer" style="box-shadow: 2px 0px 5px #2c3b41">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group {{ $errors->has('product_id') ? ' has-error' : '' }}">
                                    {!!Form::label('product_id','Product Name',[])!!}
                                    {!!Form::select('product_id',$product,null,['class'=>'edit-form-control height-35 productId','placeholder'=>'Please select one'])!!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('product_code') ? ' has-error' : '' }}">
                                    {!!Form::label('product_code','Product Code',[])!!}
                                    {!!Form::text('product_code',null,['class'=>'edit-form-control proId','readonly'=>'readonly'])!!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('qty') ? ' has-error' : '' }}">
                                    {!!Form::label('qty','Quantity',[])!!}
                                    {!!Form::number('qty',null,['class'=>'edit-form-control qty','readonly'=>'readonly','min'=>'0','autocomplete'=>'off'])!!}
                                    <div id="error">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('unitPrice') ? ' has-error' : '' }}">
                                    {!!Form::label('unitPrice','Unit Price',[])!!}
                                    {!!Form::text('unitPrice',0,['class'=>'edit-form-control price','readonly'=>'readonly'])!!}
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    {!!Form::label('amount','Amount',[])!!}
                                    {!!Form::text('amount',0,['class'=>'edit-form-control amount','readonly'=>'readonly'])!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-sm" onclick="addOrder()" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add</a>
                            <a href="{{url('/admin/cancel')}}" class="btn btn-default btn-sm">Close</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="showProduct">
                                <div class="center">
                                    <i class="fa fa-spinner fa-spin" style="font-size:24px"> </i> <span>&nbsp; Wait...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="qty_in_stock" class="qty_in_stock">
                <input type="hidden" name="qty_tmp" class="qty_tmp">
                <input type="hidden" name="qty_po_ordered" class="qty_po_ordered">
                {!!Form::close()!!}
                <div id="customer" class= "modal fade bs-example-modal-lg">

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        function addCus() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/add/cus')}}",
                dataType: 'html',
                success: function (data) {
                    $('#customer').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        $('#customerid').on('change',function(e) {
            var cusId = $(this).val();
            if(cusId!=0){
                getCusInfo(cusId);
            }else {
                $('#customerInfo').fadeOut('slow');
            }
        });
        function getCusInfo(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/cus/info')}}"+'/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#customerInfo').fadeIn('slow').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        function showProduct() {
            $.ajax({
                type: 'get',
                url: "{{url('/get/show/product')}}",
                dataType: 'html',
                success: function (data) {
                    $('#showProduct').fadeIn('slow').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function() {
            $('.customerid').select2();
            showProduct();
        });

        function addOrder(){
            var proid =$(".productId").val();
            var qty = $(".qty").val();
            var price =$(".price").val();
            var amount = $(".amount").val();
            if(!proid){
                $(".productId").css('border','1px solid red');
                $(".qty").css('border','1px solid red');
                $(".price").css('border','1px solid red');
                $(".amount").css('border','1px solid red');
                $(".proId").css('border','1px solid red');
            }
            if(qty>=0){
                $.ajax({
                    url:"{{url('/add/order/product')}}"+"/"+proid+"/"+qty+"/"+price+"/"+amount,
                    type:'get',
                    dataType: 'json',
                    success:function(data){
                        $(".productId").val('');
                        $('.proId').val(null);
                        $('.qty').val(null)
                        $('.qty').attr('readonly','readonly');
                        $(".price").val(0);
                        $(".amount").val(0);
                    },
                    error:function(error){
                        console.log(error)
                    },
                });
            }else {
                $('#error').html("<span class ='text-danger'> Invalid number!</span>");
                $('.qty').val(null);
                $(".amount").val(0);
                $(".qty").css('border','1px solid red');
                $('.qty').focus();
            }
        }

        $('.productId').on('change',function(e){
            var proId= $(this).val();
            getProductInfo(proId);
            $('#error').html('');
            $(".productId").css('border','1px solid lightblue');
            $(".qty").css('border','1px solid lightblue');
            $(".price").css('border','1px solid lightblue');
            $(".amount").css('border','1px solid lightblue');
            $(".proId").css('border','1px solid lightblue');
            $('.qty').removeAttr('readonly','readonly');
            $('.qty').val('');
            $('.qty').focus();
            $('.amount').val(0);
        });
        //---------------------------
        function getProductInfo(id){
            $.ajax({
                type: 'GET',
                url:"{{url('/get/product/info')}}"+"/"+id,
                success:function(response){
                    $('.proId').val(response.pro_code);
                    $('.qty_in_stock').val(response.qty_in_stock);
                    $('.qty_po_ordered').val(response.qty_po_ordered);
                    if(response.qty_tmp!=null){
                        $('.qty_tmp').val(response.qty_tmp);
                    }else{
                        $('.qty_tmp').val(0);
                    }
                    $('.price').val(response.price);
                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        $( ".qty" ).keyup(function() {
            var qty = $('.qty').val();
            var qty_in_stock = $('.qty_in_stock').val();
            var qty_tmp = $('.qty_tmp').val();
            var qty_po_ordered = $('.qty_po_ordered').val();
            var qtys = null;
            var qty_in_stocks = null;
            var qty_tmps = null;
            var qty_po_ordereds = null;
            var quantities = null;
            qtys = parseInt(qty);
            qty_in_stocks = parseInt(qty_in_stock);
            qty_tmps = parseInt(qty_tmp);
            qty_po_ordereds = parseInt(qty_po_ordered);
            quantities = qtys + qty_tmps +qty_po_ordereds;
            var quantity=qty_tmps +qty_po_ordereds
            var price = $('.price').val();
            var total = qty * price;
            var amount = total.toFixed(2);
            $('.amount').val(amount);
            if(quantities >= 0 && quantities <= qty_in_stocks){
                $('#error').html('');
                $('.qty').css('border','1px solid lightblue');
            }else if(quantities >= 0 && quantities > qty_in_stocks){
                $('.qty').css('border','1px solid red');
                var qty_available = qty_in_stocks - quantity;
//                alert("Stock available only: "+qty_available+" items!");
                $('#error').html("<span class ='text-danger'> Stock available only: "+qty_available+" </span>");
                $('.qty').val(null)
                $(".amount").val(0);
            }else{
                $('.amount').val(0);
                $('.qty').css('border','1px solid red');
            }
        });
    </script>
@stop