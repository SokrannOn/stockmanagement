@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="panel panel-default">
            {{--Create Users--}}
            <div class="panel-heading">Create Customer List</div>
            <div class="panel-body">
                {!! Form::open(['action'=>'CustomerController@store','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-lg-4">
                                {!! Form::label('khname','&nbsp;Khmer Name',['class'=>'edit-label']) !!}
                                {!! Form::text('khname',null,['class'=>'edit-form-control','placeholder'=>'Khmer Name', 'required'=>true ]) !!}
                                @if($errors->has('khname'))
                                    <span class="text-danger">{{$errors->first('khname')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('engname','&nbsp;Englist Name',['class'=>'edit-label']) !!}
                                {!! Form::text('engname',null,['class'=>'edit-form-control','placeholder'=>'English Name', 'required'=>true ]) !!}
                                @if($errors->has('engname'))
                                    <span class="text-danger">{{$errors->first('engname')}}</span>
                                @endif

                            </div>
                            <div class="col-lg-4">
                                {!! Form::label('contact','&nbsp;Contact No',['class'=>'edit-label']) !!}
                                {!! Form::text('contact',null,['class'=>'edit-form-control','placeholder'=>'Product Code', 'required'=>true ]) !!}
                                @if($errors->has('contact'))
                                    <span class="text-danger">{{$errors->first('contact')}}</span>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('province_id','&nbsp;Province') !!}
                                    <div class="input-group">
                                        {!! Form::select('province_id',$province,null,['class'=>'form-control province_id','placeholder'=>'---Please select one---', 'id'=>'province_id','style'=>'border-bottom-left-radius: 5px; border-top-left-radius: 5px;']) !!}
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" data-toggle="modal" data-target="#province" onclick="addPro()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('district_id','&nbsp;District') !!}
                                    <div class="input-group">
                                        {!! Form::select('district_id',$district,null,['class'=>'form-control district_id','placeholder'=>'---Please select one---','id'=>'district_id','style'=>'border-bottom-left-radius: 5px; border-top-left-radius: 5px;']) !!}
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" data-toggle="modal" data-target="#district" onclick="addDis()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('commune_id','&nbsp;Commune') !!}
                            <div class="input-group">
                                {!! Form::select('commune_id',$commune,null,['class'=>'form-control commune_id','placeholder'=>'---Please select one---', 'id'=>'commune_id','style'=>'border-bottom-left-radius: 5px; border-top-left-radius: 5px;']) !!}
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#commune" onclick="addCom()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('village_id','&nbsp;Village') !!}
                                <div class="input-group">
                                    {!! Form::select('village_id',$village,null,['class'=>'form-control','placeholder'=>'---Please select one---','id'=>'village_id','style'=>'border-bottom-left-radius: 5px; border-top-left-radius: 5px;' ]) !!}
                                    <span class="input-group-btn">
                                       <button class="btn btn-secondary" data-toggle="modal" data-target="#village" onclick="addVil()" type="button"><i class="fa fa-plus fa-fw" style="color: #0b93d5"></i></button>
                                    </span>
                                 </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('homeno','&nbsp;Home No',['class'=>'edit-label']) !!}
                            {!! Form::text('homeno',null,['class'=>'edit-form-control','placeholder'=>'Home No' ]) !!}
                            @if($errors->has('homeno'))
                                <span class="text-danger">{{$errors->first('homeno')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            {!! Form::label('streetno','&nbsp;Street No',['class'=>'edit-label']) !!}
                            {!! Form::text('streetno',null,['class'=>'edit-form-control','placeholder'=>'Street No']) !!}
                            @if($errors->has('streetno'))
                                <span class="text-danger">{{$errors->first('streetno')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-4">
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
                    <div class="col-lg-12">

                        {!!Form::submit('Create',['class'=>'btn btn-success'])!!}
                        {!! Form::reset('Clear',['class'=>'btn btn-warning btn-sm' ]) !!}
                        <a href="{{URL::to('/')}}" class="btn btn-default btn-sm">Close</a>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>

            <hr>
            {{--Users Views--}}
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">Customer Views</div>
                    <div class="panel-body">
                        <!-- /.box-header -->
                        <div id="tableCustomer">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div id="editCustomer">

                        </div>
                    </div>
                    <div id="myPopup" class="modal fade" role="dialog">
                        <div id="viewCustomer">

                        </div>
                    </div>

                </div>
            </div>
            {{--End User Views--}}
            {{--province popup--}}

            <div id="province" class="modal fade bs-province-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div style="margin: 15%">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Province
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                            </div>
                            <div class="panel-body">
                                {!! Form::label('Province Name') !!}
                                {!! Form::text('name',null,['class'=>'edit-form-control','id'=>'provincename','autocomplete'=>'off','required'=>true]) !!}
                            </div>
                            <div class="panel-footer">
                                <div id="createPro">
                                    <input type="button" value="Create" class="btn btn-success btn-sm" onclick="addProvince()">
                                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                </div>
                                <div hidden id="createProClose">
                                    <input type="button" value="Create Close" data-dismiss="modal" class="btn btn-success btn-sm" onclick="addProvince()">
                                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{--end province--}}


            {{--district popup--}}

            <div id="district" class= "modal fade bs-example-modal-sm">
                <div style="margin: 15%">
                    <div class="modal-dialog modal-sm">
                            <div id="ProSelected">
                                <div class = "panel panel-default">
                                    <div class = "panel-heading">
                                        District
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                        </button>
                                    </div>
                                    <div class = "panel-body">
                                        {!! Form::label('Distict Name') !!}
                                        {!! Form::text('name',null,['class'=>'edit-form-control','autocomplete'=>'off','id'=>'disrictname']) !!}

                                    </div>
                                    <div class="panel-footer">
                                        <div id="createDis">
                                            <input type="button" value="Create" class="btn btn-success btn-sm" onclick="addDistrict()">
                                            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                        </div>
                                        <div hidden id="createDisClose">
                                            <input type="button" value="Create Close" data-dismiss="modal" class="btn btn-success btn-sm" onclick="addDistrict()">
                                            <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ProUnselect">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h4 class="text-warning center"><i class="fa fa-warning fa-fw"></i> Please choose a province first!</h4>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            {{--end district--}}
            {{--commune popup--}}

            <div id="commune" class= "modal fade bs-example-modal-sm">
                <div style="margin: 15%">
                    <div class="modal-dialog modal-sm">
                        <div id="DisSelected">
                            <div class = "panel panel-default">
                                <div class = "panel-heading">
                                    Commune
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                </div>
                                <div class = "panel-body">
                                    {!! Form::label('Commune Name') !!}
                                    {!! Form::text('name',null,['class'=>'edit-form-control','autocomplete'=>'off','id'=>'communename']) !!}

                                </div>
                                <div class="panel-footer">
                                    <div id="createCom">
                                        <input type="button" value="Create" class="btn btn-success btn-sm" onclick="addCommune()">
                                        <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                    </div>
                                    <div hidden id="createComClose">
                                        <input type="button" value="Create Close" data-dismiss="modal" class="btn btn-success btn-sm" onclick="addCommune()">
                                        <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="DisUnselect">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4 class="text-warning center"><i class="fa fa-warning fa-fw"></i> Please choose a district first!</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--end commune--}}
            {{--village popup--}}

            <div id="village" class= "modal fade bs-example-modal-sm">
                <div style="margin: 15%">
                    <div class="modal-dialog modal-sm">
                        <div id="ComSelected">
                            <div class = "panel panel-default">
                                <div class = "panel-heading">
                                    Village
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                </div>
                                <div class = "panel-body">
                                    {!! Form::label('Village Name') !!}
                                    {!! Form::text('name',null,['class'=>'edit-form-control','autocomplete'=>'off','id'=>'villagename']) !!}

                                </div>
                                <div class="panel-footer">
                                    <div id="createVil">
                                        <input type="button" value="Create" class="btn btn-success btn-sm" onclick="addVillage()">
                                        <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                    </div>
                                    <div hidden id="createVilClose">
                                        <input type="button" value="Create Close" data-dismiss="modal" class="btn btn-success btn-sm" onclick="addVillage()">
                                        <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ComUnselect">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4 class="text-warning center"><i class="fa fa-warning fa-fw"></i> Please choose a commune first!</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--end village--}}
            {{--End Create Users--}}
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
//        $(document).ready(function () {
//            $('#customer_table').DataTable();
//        });

        $(document).ready(function() {
            $('.province_id').on('change',function(e){
                var f =document.getElementById("district_id");
                var province = $(this).val();
                if(province ==''){
                    $('.district_id').val('');
                }
                var url = "{{url('/admin/getDistrict')}}"+"/";
                getValueCombo(province,url,f);
            });
            $('.district_id').on('change',function(e){
                var f =document.getElementById("commune_id");
                var district = $(this).val();
                if(district ==''){
                    $('.commune_id').val('');
                }
                var url = "{{url('/admin/getCommune')}}"+"/";
                getValueCombo(district,url,f);
            });
            $('.commune_id').on('change',function(e){
                var f =document.getElementById("village_id");
                var commune = $(this).val();
                if(commune ==''){
                    $('.village_id').val('');
                }
                var url = "{{url('/admin/getVillage')}}"+"/";
                getValueCombo(commune,url,f);
            });
        });
        //-------------------------------------
        function province() {
            var f =document.getElementById("district_id_pop");
            var province = $('#province_id_pop').val();
            if(province ==''){
                $('.district_id_pop').val('');
            }
            var url = "{{url('/admin/getDistrict')}}"+"/";
            getValueCombo(province,url,f);
        }
        function district() {
            var f =document.getElementById("commune_id_pop");
            var district = $('#district_id_pop').val();
            if(district ==''){
                $('.commune_id_pop').val('');
            }
            var url = "{{url('/admin/getCommune')}}"+"/";
            getValueCombo(district,url,f);
        }
        function commune() {
            var f =document.getElementById("village_id_pop");
            var commune = $('#commune_id_pop').val();
            if(commune ==''){
                $('.village_id_pop').val('');
            }
            var url = "{{url('/admin/getVillage')}}"+"/";
            getValueCombo(commune,url,f);
        }

        function getValueCombo(id,ul,f)
        {
            $.ajax({
                method: 'GET',
                url: ul+id,
                success:function(response){
                    if(Array.isArray(response)){
                        $(f).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(f).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";;
                            $(f).append(serialnumber);
                        });
                    }
                },
                error:function(error){
                    console.log(error);
                }
            })
        };

        function addVil() {
            var comname = $('#commune_id').val();
            if(comname==null||comname==''){
                $('#ComSelected').hide();
                $('#ComUnselect').show();
            }else {
                $('#createVilClose').hide();
                $('#createVil').show();
                $('#ComSelected').show();
                $('#ComUnselect').hide();
                $('#villagename').focus();
                $('#villagename').css('border' ,'1px solid lightblue');
            }
        }

        $('#villagename').keyup(function() {
            var n = $('#villagename').val();
            var name = n.trim();
            if(name==''){
                $('#createVilClose').hide();
                $('#createVil').show();
            }else{
                $('#createVil').hide();
                $('#createVilClose').show();
            }
        });

        function addVillage(){
            var n = $('#villagename').val();
            var comId = $('#commune_id').val();
            var commune_id = comId.trim();
            var name = n.trim();
            if(name!=''){
                $('#villagename').css('border' ,'1px solid lightblue');
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/village/create')}}"+"/"+name+"/"+commune_id,
                    dataType: 'json',
                    success:function (data) {
                        $('#villagename').val('');
                        getSelectVillage();
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }else{
                $('#villagename').css('border' ,'1px solid red');
                document.getElementById("villagename").placeholder = "Type commune name here..";
            }
        }

        function getSelectVillage() {
            var commune_id = $('#commune_id').val();
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/select/village')}}"+"/"+commune_id,
                dataType: 'json',
                success: function (response) {
                    if(Array.isArray(response)){
                        $(village_id).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(village_id).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";
                            $(village_id).append(serialnumber);
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function addCom() {
            var disname = $('#district_id').val();
            if(disname==null||disname==''){
                $('#DisSelected').hide();
                $('#DisUnselect').show();
            }else {
                $('#createComClose').hide();
                $('#createCom').show();
                $('#DisSelected').show();
                $('#DisUnselect').hide();
                $('#communename').focus();
                $('#communename').css('border' ,'1px solid lightblue');
            }
        }

        $('#communename').keyup(function() {
            var n = $('#communename').val();
            var name = n.trim();
            if(name==''){
                $('#createComClose').hide();
                $('#createCom').show();
            }else{
                $('#createCom').hide();
                $('#createComClose').show();
            }
        });

        function addCommune(){
            var n = $('#communename').val();
            var disId = $('#district_id').val();
            var district_id = disId.trim();
            var name = n.trim();
            if(name!=''){
                $('#communename').css('border' ,'1px solid lightblue');
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/commune/create')}}"+"/"+name+"/"+district_id,
                    dataType: 'json',
                    success:function (data) {
                        $('#communename').val('');
                        getSelectCommune();
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }else{
                $('#communename').css('border' ,'1px solid red');
                document.getElementById("communename").placeholder = "Type province name here..";
            }
        }

        function getSelectCommune() {
            var district_id = $('#district_id').val();
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/select/commune')}}"+"/"+district_id,
                dataType: 'json',
                success: function (response) {
                    if(Array.isArray(response)){
                        $(commune_id).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(commune_id).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";
                            $(commune_id).append(serialnumber);
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        function addDis() {
            var proname = $('#province_id').val();
            if(proname==null||proname==''){
                $('#ProSelected').hide();
                $('#ProUnselect').show();
            }else {
                $('#createDisClose').hide();
                $('#createDis').show();
                $('#ProSelected').show();
                $('#ProUnselect').hide();
                $('#disrictname').focus();
                $('#disrictname').css('border' ,'1px solid lightblue');
            }
        }

        $('#disrictname').keyup(function() {
            var n = $('#disrictname').val();
            var name = n.trim();
            if(name==''){
                $('#createDisClose').hide();
                $('#createDis').show();
            }else{
                $('#createDis').hide();
                $('#createDisClose').show();
            }
        });


        function addDistrict(){
            var n = $('#disrictname').val();
            var proId = $('#province_id').val();
            var province_id = proId.trim();
            var name = n.trim();
            if(name!=''){
                $('#disrictname').css('border' ,'1px solid lightblue');
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/district/create')}}"+"/"+name+"/"+province_id,
                    dataType: 'json',
                    success:function (data) {
                        $('#disrictname').val('');
                        getSelectDistrict();
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }else{
                $('#disrictname').css('border' ,'1px solid red');
                document.getElementById("disrictname").placeholder = "Type province name here..";
            }
        }

        function getSelectDistrict() {
            var province_id = $('#province_id').val();
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/select/district')}}"+"/"+province_id,
                dataType: 'json',
                success: function (response) {
                    if(Array.isArray(response)){
                        $(district_id).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(district_id).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";
                            $(district_id).append(serialnumber);
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function addPro() {
            $('#createProClose').hide();
            $('#createPro').show();
            $('#provincename').focus();
            $('#provincename').css('border' ,'1px solid lightblue');
        }
        $('#provincename').keyup(function() {
            var n = $('#provincename').val();
            var name = n.trim();
            if(name==''){
                $('#createProClose').hide();
                $('#createPro').show();
            }else{
                $('#createPro').hide();
                $('#createProClose').show();
            }
        });
        function addProvince(){
            var n = $('#provincename').val();
            var name = n.trim();
            if(name!=''){
                $('#provincename').css('border' ,'1px solid lightblue');
                $.ajax({
                    type: 'get',
                    url:"{{url('/admin/province/create')}}"+"/"+name,
                    dataType: 'json',
                    success:function (data) {
                        $('#provincename').val('');
                        getSelectProvince();
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            }else{
                $('#provincename').css('border' ,'1px solid red');
                document.getElementById("provincename").placeholder = "Type province name here..";
            }
        }

        function getSelectProvince() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/select/province')}}",
                dataType: 'json',
                success: function (response) {
                    if(Array.isArray(response)){
                        $(province_id).empty();
                        var serialnumber="<option value=''>---Please select one---</option>";
                        $(province_id).append(serialnumber);
                        response.map(function(item){
                            serialnumber="<option value=" + item.id + ">" + item.name + "</option>";
                            $(province_id).append(serialnumber);
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function () {
            getTabaleCustomerlist();
        });

        function getTabaleCustomerlist() {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/get/customerlist')}}",
                dataType: 'html',
                success: function (data) {
                    $('#tableCustomer').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function deleteCustomer(id) {
            swal({
                title: "Are you sure?",
                text: "Are you sure that you want to delete this customer ?",
                type: "warning",
                showCancelButton:true,
//              closeOnConfirm: false,
                confirmButtonText: "Yes",
                cancelButtonText : "No",
                cancelButtonColor:"#d33",
                confirmButtonColor: "red"
            }, function() {
                $.ajax({
                    url : "{{url('/admin/customer/delete')}}"+"/"+id,
                    type: "get",
                    dataType: 'html'
                })
                    .done(function(data) {
                        swal("Deleted!", "Your file was successfully deleted!", "success");

                        $(document).ready(function () {
                            getTabaleCustomerlist();
                        });
                    })
                    .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                    });
            });
        }

        function editCustomer(id) {
            $.ajax({
                type: 'get',
                url:"{{url('/admin/customer/edit/')}}"+"/"+id,
                dataType: 'html',
                success:function (data) {
                    $('#editCustomer').html(data);
                },
                error:function (error) {
                    console.log(error);
                }

            });

        }

        function viewCustomer(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/customer/view')}}"+'/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#viewCustomer').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>

@endsection


