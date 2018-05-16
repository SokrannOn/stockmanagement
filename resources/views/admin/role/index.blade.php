@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default ">
            <div class="panel-heading">
                Create Role
            </div>
            <div class="panel-body">
            {!! Form::open(['action'=>'RoleController@createRole','method'=>'post']) !!}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('Role Name') !!}
                                        {!! Form::text('name',null,['class'=>'edit-form-control','required','placeholder'=>'Please provide role']) !!}
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('Permission') !!}
                                        {!! Form::select('permission_id[]',$pe,null,['class'=>'edit-form-control','placeholder'=>'Please provide permission','id'=>'permission','multiple'=>'true','required']) !!}
                                        @if($errors->has('permission_id'))
                                            <span class="text-danger">{{$errors->first('permission_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm' ]) !!}
                                        {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm' ]) !!}
                                        <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            {!! Form::label('List Views') !!}
                            <div id="roleView">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Role Name</th>
                                            <th>Permission</th>
                                            <th>Created By</th>
                                            <th style="width:20%; !important;" class="center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @foreach($role as $r)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$r->name}}</td>
                                                <td>
                                                    @foreach($r->permissions as $p)
                                                        <span class="label label-success">{{$p->name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>{{\App\User::where('id',$r->user_id)->value('name')}}</td>
                                                <td class="center">
                                                    <a href="#" onclick="updateRole('{{$r->id}}')" data-toggle="modal" data-target=".bs-example-modal-sm" style="padding: 5px;"><i class="fa fa-edit" style="color: #d59b0a"></i></a>
                                                    <a href="{{url('/admin/delete/role',[$r->id])}}" style="padding: 5px;"><i class="fa fa-trash" style="color: red;"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div id="updateRole">

               </div>
            </div>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateRole(id) {
            $.ajax({
                type: 'get',
                url : "{{url('/admin/update/role/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#updateRole').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        $(document).ready(function() {
            $('#permission').select2();
        });


    </script>
@endsection

