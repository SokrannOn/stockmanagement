
<div class="modal-dialog">
{!! Form::model($productlist,['action'=>['ProductlistController@updateProlist',$productlist->id],'method'=>'PATCH','files'=>true]) !!}

<!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Product List</h4>
        </div>
        <div class="modal-body">
            <div >
                <div class="row">

                            <div class="col-lg-6">
                                {!! Form::label('name','&nbsp;English Name',['class'=>'edit-label']) !!}
                                {!! Form::text('engname',null,['class'=>'edit-form-control','placeholder'=>'Name', 'required'=>true ]) !!}
                                @if($errors->has('engname'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('khname','&nbsp;Khmer Name',['class'=>'edit-label']) !!}
                                {!! Form::text('khname',null,['class'=>'edit-form-control','placeholder'=>'User Name', 'required'=>true ]) !!}
                                @if($errors->has('khname'))
                                    <span class="text-danger">{{$errors->first('khname')}}</span>
                                @endif

                            </div>

                            <div class="col-lg-6">
                                {!! Form::label('name','&nbsp;Product Code',['class'=>'edit-label']) !!}
                                {!! Form::text('productcode',null,['class'=>'edit-form-control','placeholder'=>'Name', 'required'=>true ]) !!}
                                @if($errors->has('productcode'))
                                    <span class="text-danger">{{$errors->first('productcode')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                {!! Form::label('productbarcode','&nbsp;Product Barcode',['class'=>'edit-label']) !!}
                                {!! Form::text('productbarcode',null,['class'=>'edit-form-control','placeholder'=>'User Name', 'required'=>true ]) !!}
                                @if($errors->has('productbarcode'))
                                    <span class="text-danger">{{$errors->first('productbarcode')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-12">
                                {!! Form::label('category_id','&nbsp;Category',['class'=>'edit-label']) !!}
                                {!! Form::select('category_id',$category,null,['class'=>'edit-form-control','placeholder'=>'Category', 'required'=>true ]) !!}
                                @if($errors->has('category_id'))
                                    <span class="text-danger">{{$errors->first('category_id')}}</span>
                                @endif
                            </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm pull-left' ]) !!}
            <a href="#" data-dismiss="modal" class="btn btn-default btn-sm pull-left">Close</a>
        </div>

    </div>
    {!! Form::close() !!}
</div>

{{--<script type="text/javascript">--}}
    {{--var loadFileEdit = function(event) {--}}
        {{--var output = document.getElementById('preViewEdit');--}}
        {{--output.src = URL.createObjectURL(event.target.files[0]);--}}
    {{--};--}}
{{--</script>--}}






