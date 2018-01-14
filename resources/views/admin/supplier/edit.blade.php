
<div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content" style="border-radius: 5px;">
        {!! Form::model($supplier,['action'=>['SupplierController@update',$supplier->id],'method'=>'PATCH','files'=>true]) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Supplier</h4>
        </div>
        <div class="modal-body">
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
                {!! Form::text('contactnumber',null,['class'=>'edit-form-control']) !!}
                @if($errors->has('contactnumber'))
                    <span class="text-danger">{{$errors->first('contactnumber')}}</span>
                @endif
            </div>
            <div class="form-groupt">
                {!! Form::label('Address') !!}
                {!! Form::textarea('address',null,['class'=>'edit-form-control','rows'=>'2']) !!}
                @if($errors->has('address'))
                    <span class="text-danger">{{$errors->first('address')}}</span>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm pull-left' ]) !!}
            <a href="#" data-dismiss="modal" class="btn btn-default btn-sm pull-left">Close</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>






