@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stock In
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['id'=>'stockin']) !!}
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('Start Date') !!}
                                        {!! Form::date('start',null,['class'=>'edit-form-control','required']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('End Date') !!}
                                        {!! Form::date('end',null,['class'=>'edit-form-control','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::submit('Show',['class'=>'btn btn-success btn-sm']) !!}
                                    </div>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div id="stockinReport"></div>
                        </div>
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
        $('#stockin').submit(function (e) {
           e.preventDefault();
           $.ajax({
               type : 'post', url : "{{route('report.store')}}", data : $('#stockin').serialize(), dataType : 'html',
               beforeSend:function () {

               },
               success:function (data) {
                   $('#stockinReport').html(data);
               },
               error:function (error) {

                   console.log(error);
               }
           });

        });

        function print() {
            $('#printReport').printThis();
        }
        function excel() {
            var htmltable= document.getElementById('printReport');
            var html = htmltable.outerHTML;
            var sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
            return (sa);
        }

    </script>
@endsection

