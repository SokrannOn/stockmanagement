@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stock Out
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {!! Form::open([]) !!}
                                        {!! Form::label('invnum','Invoice Number') !!}
                                        {!! Form::select('invnum',[],null,['class'=>'edit-form-control','placeholder'=>'Please choose invoice number']) !!}
                                        {!! Form::submit('Stock Out',['class'=>'btn btn-success btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection