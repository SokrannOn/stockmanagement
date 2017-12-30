@extends('layouts.app')
@section('content')
    <div class="changePassword">
        <div class="container-fluid">
            {!! Form::open(['method'=>'POST', 'action'=>'DefaultController@changedPass']) !!}
            {{csrf_field()}}

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-10">
                        {!! Form::label('password','&nbsp;New Password',['class'=>'edit-label']) !!}
                        {!! Form::password('password',['class'=>'edit-form-control','pattern'=>'.{8,}','placeholder'=>'New Password','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 8 characters' : '');
                        if(this.checkValidity()) form.confirm_pass.pattern = this.value;",'required'=>true ]) !!}
                        @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-10">
                        {!! Form::label('confirm','&nbsp;Confirm',['class'=>'edit-label']) !!}
                        {!! Form::password('confirm_pass',['class'=>'edit-form-control','placeholder'=>'Confirm password','pattern'=>'.{8,}','onchange'=>"this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');", 'required'=>true ]) !!}

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::submit('Change',['class'=>'btn btn-primary btn-sm']) !!}

                    </div>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection




