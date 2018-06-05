<div style="margin-top: 15%;" class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="border-radius: 10px;">
        <div class="panel panel-default">
            <div class="panel-body">
                {!!Form::open(['method'=>'POST','id','order'])!!}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            {!!Form::hidden('proId',$id,['class'=>'edit-form-control pro_Id'])!!}
                            {!!Form::hidden('price',$price,['class'=>'edit-form-control pro_price'])!!}
                            {!!Form::hidden('available',$qtyAval,['class'=>'edit-form-control','id'=>'available'])!!}
                            {!! Form::label('qty','Quantities : ') !!}
                            {!!Form::number('qty',null,['class'=>'edit-form-control qty','placeholder'=>'Type product qty here...'])!!}
                            <div id="default">
                                <span class="text-info">Stock Available: {{$qtyAval}} items</span>
                            </div>
                            <div id="error" hidden>
                                <span class="text-danger">Stock Not Available</span>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                <div id="orderPro">
                    <input type="button" disabled value="Order" class="btn btn-primary btn-sm">
                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                </div>
                <div hidden id="orderProClose">
                    <input type="button" value="Order" data-dismiss="modal" class="btn btn-primary btn-sm" onclick="order()">
                    <input type="button" value="Close" data-dismiss="modal" class="btn btn-danger btn-sm">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#qty').keyup(function() {
        $('#qty').css('border','1px solid lightblue');
        var q = $('#qty').val();
        var a = $('#available').val();
        var available = parseInt(a);
        var qt = q.trim();
        var qty = parseInt(qt);
        if(qty >=0 && qty <= available){
            $('#error').hide();
            $('#default').show();
            $('#orderPro').hide();
            $('#orderProClose').show();
            $('#qty').css('border','1px solid lightblue');
        }else{
            if(qty >available){
                $('#error').show();
                $('#default').hide();
            }
            $('#orderProClose').hide();
            $('#orderPro').show();
            $('#qty').css('border','1px solid red');
        }
    });
</script>