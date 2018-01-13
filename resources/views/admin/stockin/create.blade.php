@extends('admin.master')

@section('content')
    <div class="container-fluid"><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Import Products
            </div>
            <div class="panel-body">
                {!! Form::open(['action'=>'StockController@store','method'=>'post']) !!}
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
                                {!! Form::label('Manufacture Date') !!}
                                {!! Form::date('mfd',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('mfd'))
                                    <span class="text-danger">{!! $errors->first('mfd') !!}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{--one row--}}
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Expired Date') !!}
                                {!! Form::date('expd',null,['class'=>'edit-form-control']) !!}

                                @if($errors->has('expd'))
                                    <span class="text-danger">{!! $errors->first('expd') !!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Discount(%)') !!}
                                {!! Form::number('dis',null,['class'=>'edit-form-control','min'=>'0','placeholder'=>'Discount']) !!}
                                @if($errors->has('dis'))
                                    <span class="text-danger">{!! $errors->first('dis') !!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Product') !!}
                                {!! Form::select('product',$pro,null,['class'=>'edit-form-control','placeholder'=>'Please select product','id'=>'product']) !!}
                                @if($errors->has('product'))
                                    <span class="text-danger">{!! $errors->first('product') !!}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                {!! Form::label('Quantities') !!}
                                {!! Form::number('qty',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('qty'))
                                    <span class="text-danger">{!! $errors->first('qty') !!}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::submit('Add',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::reset('Reset',['class'=>'btn btn-danger btn-sm']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}


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
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript">

        $(function () {
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
        });
    </script>

@endsection