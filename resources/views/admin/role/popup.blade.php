
    <div class="modal-dialog modal-sm" role="document">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update
            </div>
            {!! Form::model($role,['action'=>['RoleController@updateRole',$role->id],'method'=>'PATCH']) !!}
            <div class="panel-body">
                {!! Form::label('Role Name') !!}
                {!! Form::text('name',null,['class'=>'edit-form-control','required'=>true]) !!}
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('Permission') !!}
                            {!! Form::select('permission_id[]',$per,null,['class'=>'edit-form-control','placeholder'=>'Please provide permission','id'=>'permission_edit','multiple'=>'true','required']) !!}
                            @if($errors->has('permission_id'))
                                <span class="text-danger">{{$errors->first('permission_id')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                {!! Form::submit('Update',['class'=>'btn btn-success btn-sm']) !!}
                <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
        <script>
            $(function () {
                $('#permission_edit').select2().val({{$role->permissions->pluck('id')}}).trigger("change");
            })
        </script>
