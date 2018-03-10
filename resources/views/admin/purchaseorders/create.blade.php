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

                    <div class="panel panel-footer panel-primary">
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
                        <div class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-primary btn-xs add" onclick="addOrderCus()" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add</a>
                                <a class="btn btn-info btn-xs" onclick="showProductCus()" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                <a href="{{url('/admin/cancel')}}" class="btn btn-warning btn-xs pull-right">Cancel</a>
                            </div>
                        </div>
                    </div>

                {!!Form::submit('Submit',['class'=>'btn btn-success'])!!}
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

        $(document).ready(function() {
            $('.customerid').select2();
        });

        function addOrderCus(){
            var proid =$(".productId").val();
            var qty = $(".qty").val();
            var price =$(".price").val();
            var amount = $(".amount").val();
            if(qty){
                $.ajax({
                    url:"{{url('/addOrderCus')}}"+"/"+proid+"/"+qty+"/"+price+"/"+amount,
                    type:'get',
                    dataType: 'json',
                    success:function(data){
                        $('.add').attr('disabled','true');
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
            }
        }

        $('.productId').on('change',function(e){
            var proId= $(this).val();
            $('.qty').removeAttr('readonly','readonly');
            $('.qty').val('');
            $('.qty').focus();
            $('.qty').css('border','1px solid lightblue');
            $('.amount').val(0);
            if(proId==''){
                $('.add').attr('disabled','true');
                $('.qty').attr('readonly','readonly');
                $('.qty').css('border','1px solid lightblue');
                $('.proId').val(null);
                $('.price').val(0);
                $('.amount').val(0);
                $('.productId').focus();
            }else{
                getProductInfo(proId);
            }
        });
        //---------------------------
        function getProductInfo(id){
            $.ajax({
                type: 'GET',
                url:"{{url('/get/product/info')}}"+"/"+id,
                success:function(response){
                    $('.proId').val(response.pro_code);
                    $('.qty_pro_in_stock').val(response.qty_product);
                    if(response.tmp_pro_qty!=null){
                        $('.tmp_pro_qty').val(response.tmp_pro_qty);
                    }else{
                        $('.tmp_pro_qty').val(0);
                    }
                    $('.price').val(response.price);
                },
                error:function(error){
                    console.log(error);
                }
            });
        }
    </script>
@stop