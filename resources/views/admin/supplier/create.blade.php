@extends('admin.master')


@section('content')
    <div class="container-fluid"><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Supplier
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        {!! Form::open(['action'=>'SupplierController@store','method'=>'post']) !!}
                            <div class="form-groupt">
                                {!! Form::label('Supplier Name') !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-groupt">
                                {!! Form::label('Email') !!}
                                {!! Form::email('email',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-groupt">
                                {!! Form::label('Contact Number') !!}
                                {!! Form::text('contact',null,['class'=>'edit-form-control']) !!}
                                @if($errors->has('contact'))
                                    <span class="text-danger">{{$errors->first('contact')}}</span>
                                @endif
                            </div>
                            <div class="form-groupt">
                                {!! Form::label('Address') !!}
                                {!! Form::textarea('address',null,['class'=>'edit-form-control','rows'=>'2']) !!}
                                @if($errors->has('address'))
                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            <div class="form-groupt">
                                {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                                {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-lg-8">
                        {{--Users Views--}}
                        {{--<div class="container-fluid">--}}
                        <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">Supplier List</div>
                                <div class="panel-body">
                                    <!-- /.box-header -->
                                    <div id="viewSupplier" style="overflow-x:scroll;">

                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div id="editSupplier">

                                    </div>
                                </div>

                            </div>
                        {{--</div>--}}
                        {{--End User Views--}}
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
    function getTableSupplier() {
        $.ajax({
            type : 'get',
            url: "{{route('supplier.index')}}",
            dataType: 'html',
            success:function (data) {
                $('#viewSupplier').html(data);
            },
            error:function (error) {
                console.log(error);
            }
        });
    }
        $(document).ready(function () {
            getTableSupplier();
        });

        function editSupplier(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/supplier/edit')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editSupplier').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function deleteSupplier(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this supplier ?",
                type: "warning",
                showCancelButton:true,
//                  closeOnConfirm: false,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "red"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/supplier/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTableSupplier();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }
    </script>

@endsection