<div style="margin-top: 10%;" class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="border-radius:5px;">
        <div class="modal-body">
            {!!Form::open(['method'=>'POST','id','order'])!!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input id="due" type="date" class="form-control" autocomplete="off" name="dueDate" placeholder="Due Date" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">៛</span>
                            <input id="rate" type="text" class="form-control" autocomplete="off" name="rate" placeholder="Khmer Exchange Rate" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input id="deposit" type="text" class="form-control" autocomplete="off" name="depositdeposit" placeholder="Deposit" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">%</span>
                            <input id="vat" type="text" class="form-control" name="vat" autocomplete="off" placeholder="VAT" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="">
                <div id="done">
                    <input type="button" disabled value="Done" class="btn btn-primary btn-sm">
                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                </div>
                <div hidden id="doneClose">
                    <input type="button" value="Done" data-dismiss="modal" class="btn btn-primary btn-sm" onclick="done({{$id}})">
                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#rate').keyup(function() {
        var d = $('#deposit').val();
        var r = $('#rate').val();
        var v = $('#vat').val();
        if(r){
            $('#rate').css('border','1px solid lightblue');
        }else{
            $('#rate').css('border','1px solid red');
        }
        if(d!='' & r!='' & v!=''){
            $('#doneClose').show();
            $('#done').hide();
        }else{
            $('#doneClose').hide();
            $('#done').show();
        }

    });
    $('#deposit').keyup(function() {
        var d = $('#deposit').val();
        var r = $('#rate').val();
        var v = $('#vat').val();
        if(d){
            $('#deposit').css('border','1px solid lightblue');
        }else{
            $('#deposit').css('border','1px solid red');
        }
        if(d!='' & r!='' & v!=''){
            $('#doneClose').show();
            $('#done').hide();
        }else{
            $('#doneClose').hide();
            $('#done').show();
        }
    });
    $('#vat').keyup(function() {
        var d = $('#deposit').val();
        var r = $('#rate').val();
        var v = $('#vat').val();
        if(v){
            $('#vat').css('border','1px solid lightblue');
        }else{
            $('#vat').css('border','1px solid red');
        }
        if(d!='' & r!='' & v!=''){
            $('#doneClose').show();
            $('#done').hide();
        }else{
            $('#doneClose').hide();
            $('#done').show();
        }

    });
</script>