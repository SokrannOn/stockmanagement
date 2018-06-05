<div class="modal-dialog modal-lg">
    <div class = "panel panel-default">
        <div class = "panel-heading">
            Customer
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
            </button>
        </div>
        <div class = "panel-body">
            {!! Form::open(['action'=>'CustomerController@store','method'=>'POST']) !!}
            {{csrf_field()}}
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
                    {!! Form::label('contact','&nbsp;Contact No',['class'=>'edit-label']) !!}
                    {!! Form::text('contact',null,['class'=>'edit-form-control','placeholder'=>'Product Code', 'required'=>true ]) !!}
                    @if($errors->has('contact'))
                        <span class="text-danger">{{$errors->first('contact')}}</span>
                    @endif

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('channel_id','&nbsp;Channel Name',['class'=>'edit-label margin-left-5px']) !!}
                        {!! Form::select('channel_id',$channel,null,['class'=>'edit-form-control','placeholder'=>'Please select one', 'required'=>true ]) !!}
                        @if($errors->has('channel_id'))
                            <span class="text-danger">{{$errors->first('channel_id')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('province_id','&nbsp;Province') !!}
                        {!! Form::select('province_id',$province,null,['class'=>'edit-form-control province_id_pop','onchange'=>'province()','id'=>'province_id_pop','placeholder'=>'---Please select one---', 'required'=>true]) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('district_id','&nbsp;District') !!}
                        {!! Form::select('district_id',$district,null,['class'=>'edit-form-control district_id_pop','onchange'=>'district()','id'=>'district_id_pop','placeholder'=>'---Please select one---', 'required'=>true]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('commune_id','&nbsp;Commune') !!}
                        {!! Form::select('commune_id',$commune,null,['class'=>'edit-form-control commune_id_pop','onchange'=>'commune()','id'=>'commune_id_pop','placeholder'=>'---Please select one---', 'required'=>true]) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('village_id','&nbsp;Village') !!}
                        {!! Form::select('village_id',$village,null,['class'=>'edit-form-control village_id_pop','id'=>'village_id_pop','placeholder'=>'---Please select one---', 'required'=>true ]) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('homeno','&nbsp;Home No',['class'=>'edit-label']) !!}
                        {!! Form::text('homeno',null,['class'=>'edit-form-control','placeholder'=>'Home No' ]) !!}
                        @if($errors->has('homeno'))
                            <span class="text-danger">{{$errors->first('homeno')}}</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('streetno','&nbsp;Street No',['class'=>'edit-label']) !!}
                        {!! Form::text('streetno',null,['class'=>'edit-form-control','placeholder'=>'Street No']) !!}
                        @if($errors->has('streetno'))
                            <span class="text-danger">{{$errors->first('streetno')}}</span>
                        @endif
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!!Form::submit('Create',['class'=>'btn btn-primary btn-sm'])!!}
                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        </div>
    </div>
