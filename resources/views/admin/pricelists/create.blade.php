@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="panel panel-default">
            {{--Create Users--}}
            <div class="panel-heading">Create Price List</div>
            <div class="panel-body">
                {!! Form::open(['action'=>'PricelistController@store','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('product_id','&nbsp;Product Name',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::select('product_id',$product,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}
                                @if($errors->has('product_id'))
                                    <span class="text-danger">{{$errors->first('product_id')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('fobprice','&nbsp;FoB Price',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::text('fobprice',null,['class'=>'edit-form-control','required'=>true ]) !!}
                                @if($errors->has('fobprice'))
                                    <span class="text-danger">{{$errors->first('fobprice')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('margin','&nbsp;Margin',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::text('margin',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                                @if($errors->has('margin'))
                                    <span class="text-danger">{{$errors->first('margin')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('landingprice','&nbsp;Landing Price',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::text('landingprice',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                                @if($errors->has('landingprice'))
                                    <span class="text-danger">{{$errors->first('landingprice')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('sellingprice','&nbsp;Selling Price',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::text('sellingprice',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                                @if($errors->has('sellingprice'))
                                    <span class="text-danger">{{$errors->first('sellingprice')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('startdate','&nbsp;Begin Date',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::date('startdate',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                                @if($errors->has('startdate'))
                                    <span class="text-danger">{{$errors->first('startdate')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('enddate','&nbsp;End Date',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::date('enddate',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                                @if($errors->has('enddate'))
                                    <span class="text-danger">{{$errors->first('enddate')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                {!! Form::submit('Create',['class'=>'btn btn-success btn-sm' ]) !!}
                                {!! Form::reset('Clear',['class'=>'btn btn-warning btn-sm' ]) !!}
                                <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>

                            </div>
                        </div>

                {!! Form::close() !!}
            </div>

            <hr>
            {{--End Create Users--}}

            {{--Users Views--}}
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">Product View</div>
                    <div class="panel-body">
                        <!-- /.box-header -->
                        <div id="pricelist">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div id="editPri">

                        </div>
                    </div>

                </div>
            </div>
            {{--End User Views--}}
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        function getTabalePricelist() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/pricelist')}}",
                dataType: 'html',
                success: function (data) {
                    $('#pricelist').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function () {
            getTabalePricelist();
        });

        function editPrilist(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/pricelist/edit/')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editPri').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function deletePricelist(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this pricelist ?",
                type: "warning",
                showCancelButton:true,
//                  closeOnConfirm: false,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "red"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/pricelist/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTabalePricelist();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }


    </script>

@endsection


