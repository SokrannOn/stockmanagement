@extends('admin.master')

@section('content')
    <div class="container-fluid"><br>
        <div class="panel panel-default">
            {!! Form::open(['action'=>'StockController@store','method'=>'post','id'=>'importProduct']) !!}
                <div class="panel-heading">
                    Import Products
                </div>
                <div class="panel-body">
                        <div class="row">

                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Invoice Date') !!}
                                    {!! Form::date('invdate',null,['class'=>'edit-form-control']) !!}
                                    @if($errors->has('invdate'))
                                        <span class="text-danger">{!! $errors->first('invdate') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Invoice Number') !!}
                                    {!! Form::text('invnum',null,['class'=>'edit-form-control','placeholder'=>'INV-000234']) !!}
                                    @if($errors->has('invnum'))
                                        <span class="text-danger">{!! $errors->first('invnum') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Supplier') !!}
                                    {!! Form::select('supplier',$su,null,['class'=>'edit-form-control','placeholder'=>'Please choose supplier']) !!}
                                    @if($errors->has('supplier'))
                                        <span class="text-danger">{!! $errors->first('supplier') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Discount(%)') !!}
                                    {!! Form::number('dis',0,['class'=>'edit-form-control','min'=>'0','placeholder'=>'Discount','id'=>'dis']) !!}
                                    @if($errors->has('dis'))
                                        <span class="text-danger">{!! $errors->first('dis') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--one row--}}
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Manufacture Date') !!}
                                    {!! Form::date('mfd',null,['class'=>'edit-form-control','id'=>'mfd']) !!}
                                    @if($errors->has('mfd'))
                                        <span class="text-danger">{!! $errors->first('mfd') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Expired Date') !!}
                                    {!! Form::date('expd',null,['class'=>'edit-form-control','id'=>'expd']) !!}

                                    @if($errors->has('expd'))
                                        <span class="text-danger">{!! $errors->first('expd') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Product') !!}
                                    {!! Form::select('product',$pro,null,['class'=>'edit-form-control','placeholder'=>'Please select product','id'=>'productid']) !!}
                                    @if($errors->has('product'))
                                        <span class="text-danger">{!! $errors->first('product') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    {!! Form::label('Quantities') !!}
                                    {!! Form::number('qty',null,['class'=>'edit-form-control','id'=>'qty']) !!}
                                    @if($errors->has('qty'))
                                        <span class="text-danger">{!! $errors->first('qty') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="btn btn-primary btn-sm" onclick="addProduct()" style="width:100px; ">Add Product</a>
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::label('View Product') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div id="getProduct">


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript">
        function addProduct() {
//            {mfd}/{expd}/{dis}/{productId}/{qty}
            var error = "";
            var mdf=0;
            var expd=0;
            var dis =$('#dis').val();

            if(dis<0 || dis>100){
                $('#dis').css('border','1px solid red');
                error="have error";
            }
            if(!$('#mfd').val()){
                $('#mfd').css('border','1px solid red');
                error="have error";
            }
            if(!$('#expd').val()){
                $('#expd').css('border','1px solid red');
                error="have error";
            }
            if(!$('#productid').val()){
                $('#productid').css('border','1px solid red');
                error="have error";
            }
            if(!$('#qty').val()){
                $('#qty').css('border','1px solid red');
                error="have error";
            }

            if(error==""){
                mdf=$('#mfd').val();
                expd =$('#expd').val();
                var productid = $('#productid').val();
                var qty = $('#qty').val();

                $.ajax({
                    type: 'get',
                    url: "{{url('/stock/addproduct/')}}"+"/"+mdf+"/"+expd+"/"+dis+"/"+productid+"/"+qty,
                    dataType: 'html',
                    success:function (data) {
                        $('#mfd').val(null);
                        $('#expd').val(null);
                        $('#productid option').prop('selected',function () {
                           return this.defaultSelected;
                        });
                        $('#qty').val(null);
                        getData();
                        console.log(data);
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }
        }
        function discardRecord() {
            $.ajax({
                type: 'get',
                url: "{{url('/stock/discard/record')}}",
                dataType:'html',
                success:function (data) {
                    $('#importProduct')[0].reset();
                    getData();
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }


        function getData() {
            $.ajax({
                type: 'get',
                url: "{{route('stock.index')}}",
                dataType:'html',
                success:function (data) {
                    $('#getProduct').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(function () {
            getData();
        });
    </script>

@endsection