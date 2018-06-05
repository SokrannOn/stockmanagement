@extends('admin.master')
@section('content')
    <br>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                Create New Purchase Order
            </div>
            <div class="panel-body">
                {!!Form::open(['action'=>'PurchaseorderController@store','method'=>'POST'])!!}
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('customer_id','&nbsp;Customer Name',['class'=>'edit-label']) !!}
                                <div class="input-group">
                                    <select name="customer_id" class="form-control height-35 customerid" style="width: 100%;border-bottom-left-radius: 5px; border-top-left-radius: 5px;" required id="customerid">
                                            <option value="">Please select one</option>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default scroll-y" style="box-shadow: 2px 0px -11px #2c3b41; height: 400px;">
                                @foreach($category as $c)
                                    <div class="single category">
                                        <h3 class="side-title">{{$c->name}}</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-lg-12" style="width: 5000px">
                                                @foreach($product as $p)
                                                    @if($p->category_id==$c->id)
                                                        <div style="float: left;text-align: center">
                                                            <ul class="popover-pop list-inline">
                                                                <li>
                                                                    <a class="cursor-pointer" data-toggle="popover"
                                                                       data-content="
                                                                       <?php
                                                                            $price = \Illuminate\Support\Facades\DB::table('pricelists')->where([['productlist_id',$p->id],['startdate','<=',$now],['enddate','>=',$now],])->value('sellingprice');
                                                                            if($price){
                                                                                echo 'Code: '.$p->productcode . ' | Price: $ '.$price;
                                                                            }else{
                                                                                echo 'Code: '.$p->productcode . ' | Price: $ '. 0;
                                                                            }
                                                                       ?>">
                                                                        <div class="item">
                                                                            <img src="{{asset('/product_images/default-product.png')}}" alt="">
                                                                            <div class="item-overlay top"></div>
                                                                            <div class="middle">
                                                                                <button type="button" onclick="buy('{{$p->id}}')" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-danger btn-sm">Buy</button>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <input type="hidden" value="0" name="discount" class="Maindiscount">
                <input type="hidden" value="0" name="cod" class="Maincod">
                <input type="hidden" value="0" name="grandTotal" class="MaingrandTotal">
                <input type="hidden" value="0" name="totalAmount" class="MaintotalAmount">

                <div id="customer" class= "modal fade bs-example-modal-lg">

                </div>
                <div id="buy" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

                </div>

            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="showProduct">
                            <div class="center">
                                <i class="fa fa-spinner fa-spin" style="font-size:24px"> </i> <span>&nbsp; Wait...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::submit('Save',['class'=>'btn btn-success btn-sm btnSave']) !!}
                        {!! Form::reset('Discard',['class'=>'btn btn-danger btn-sm' ]) !!}
                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        function remove(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/remove/product')}}"+"/"+id,
                success:function (data) {
                    showProduct();
                },
                error:function (error) {
                    console.log(error);
                }

            });
        }

        function order(){
            var price =0;
            var id = $('.pro_Id').val();
            price = $('.pro_price').val();
            var qty = $('.qty').val();
            if(qty!=''){
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/add/order')}}"+"/"+id+"/"+price+'/'+qty,
                    dataType: 'json',
                    success:function (data) {
                        if(data.tmp){
                            showProduct();
                        }

                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }
        }

        $(document).ready(function () {
            $(".popover-pop a").popover({
                trigger: 'hover',
            });
        });

        function buy(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/product/buy')}}"+'/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#buy').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
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