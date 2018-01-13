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
                        <br>
                            <div class="form-groupt">
                                {!! Form::submit('Add',['class'=>'btn btn-primary btn-sm']) !!}
                                {!! Form::reset('Reset',['class'=>'btn btn-danger btn-sm']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-lg-8">
                        {!! Form::label('List Views') !!}
                        <div id="viewSupplier">

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">

        $(function () {
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

        });
    </script>

@endsection