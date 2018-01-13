
<div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content" style="border-radius: 5px;">
        {!! Form::model($pricelist,['action'=>['PricelistController@update',$pricelist->id],'method'=>'PATCH','files'=>true]) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Price List</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    {!! Form::label('product_id','&nbsp;Product Name',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::select('product_id',$product,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}
                    @if($errors->has('product_id'))
                        <span class="text-danger">{{$errors->first('product_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::label('fobprice','&nbsp;FoB Price',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::text('fobprice',null,['class'=>'edit-form-control','required'=>true ]) !!}
                    @if($errors->has('fobprice'))
                        <span class="text-danger">{{$errors->first('fobprice')}}</span>
                    @endif
                </div>
                <div class="col-lg-6">
                    {!! Form::label('margin','&nbsp;Margin',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::text('margin',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                    @if($errors->has('margin'))
                        <span class="text-danger">{{$errors->first('margin')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::label('landingprice','&nbsp;Landing Price',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::text('landingprice',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                    @if($errors->has('landingprice'))
                        <span class="text-danger">{{$errors->first('landingprice')}}</span>
                    @endif
                </div>
                <div class="col-lg-6">
                    {!! Form::label('sellingprice','&nbsp;Selling Price',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::text('sellingprice',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                    @if($errors->has('sellingprice'))
                        <span class="text-danger">{{$errors->first('sellingprice')}}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::label('startdate','&nbsp;Begin Date',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::date('startdate',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                    @if($errors->has('startdate'))
                        <span class="text-danger">{{$errors->first('startdate')}}</span>
                    @endif
                </div>
                <div class="col-lg-6">
                    {!! Form::label('enddate','&nbsp;End Date',['class'=>'edit-label margin-left-5px']) !!}
                    {!! Form::date('enddate',null,['class'=>'edit-form-control', 'required'=>true ]) !!}
                    @if($errors->has('enddate'))
                        <span class="text-danger">{{$errors->first('enddate')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Update',['class'=>'btn btn-success btn-sm pull-left' ]) !!}
            <a href="#" data-dismiss="modal" class="btn btn-default btn-sm pull-left">Close</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>






