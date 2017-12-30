@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="panel panel-default">
            {{--Create Users--}}
            <div class="panel-heading">Create Product List</div>
            <div class="panel-body">
                {!! Form::open(['action'=>'ProductlistController@store','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('khname','&nbsp;Khmer Name',['class'=>'edit-label']) !!}
                                {!! Form::text('khname',null,['class'=>'edit-form-control','placeholder'=>'Khmer Name', 'required'=>true ]) !!}
                                @if($errors->has('khname'))
                                    <span class="text-danger">{{$errors->first('khname')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('engname','&nbsp;Englist Name',['class'=>'edit-label']) !!}
                                {!! Form::text('engname',null,['class'=>'edit-form-control','placeholder'=>'English Name', 'required'=>true ]) !!}
                                @if($errors->has('engname'))
                                    <span class="text-danger">{{$errors->first('engname')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {!! Form::label('productcode','&nbsp;Product Code',['class'=>'edit-label']) !!}
                                {!! Form::text('productcode',null,['class'=>'edit-form-control','placeholder'=>'Product Code', 'required'=>true ]) !!}
                                @if($errors->has('productcode'))
                                    <span class="text-danger">{{$errors->first('productcode')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('productbarcode','&nbsp;Product Barcode',['class'=>'edit-label']) !!}
                                {!! Form::text('productbarcode',null,['class'=>'edit-form-control','placeholder'=>'Product Barcode', 'required'=>true ]) !!}
                                @if($errors->has('productbarcode'))
                                    <span class="text-danger">{{$errors->first('productbarcode')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('category_id','&nbsp;Category Name',['class'=>'edit-label margin-left-5px']) !!}
                                {!! Form::select('category_id',$category,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}
                                @if($errors->has('category_id'))
                                    <span class="text-danger">{{$errors->first('category_id')}}</span>
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
                        <div id="box-body">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div id="editPro">

                        </div>
                    </div>
                    <!-- Modal -->
                    <div id="viewUser" class="modal fade" role="dialog">
                        <div id="viewUser">

                        </div>
                    </div>
                    {{--reset password--}}

                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div id="resetPassword">

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
        function getTabaleProdctlist() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/productlist')}}",
                dataType: 'html',
                success: function (data) {
                    $('#box-body').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function () {
            getTabaleProdctlist();
        });


        var loadFile = function(event) {
            var output = document.getElementById('preView');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFileEdit = function(event) {
            var output = document.getElementById('preViewEdit');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        function editProlist(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/productlist/edit/')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editPro').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }
        function viewUser(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/user/view')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#viewUser').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function deleteProductlist(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this product ?",
                type: "warning",
                showCancelButton:true,
//                  closeOnConfirm: false,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "#1a7eec"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/productlist/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTabaleProdctlist();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function resetPassword(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/reset/password')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#resetPassword').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });
        }

    </script>

@endsection


