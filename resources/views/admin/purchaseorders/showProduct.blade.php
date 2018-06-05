@if($tmpdata->count())
    <div class="panel panel-default table-responsive">
        <table class="table table-bordered table-hover table-striped" cellspacing="0">
            <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th>Product Name</th>
                <th style="text-align: center;">Quantities</th>
                <th style="text-align: center;">Unit Price</th>
                <th style="text-align: center;">Amount</th>
                <th style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <?php $no=1;?>
            <tbody>
            @foreach($tmpdata as $tmppo)
                <tr>
                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">{{$no++}}</td>
                    <td style="font-size: 13px; font-family: 'Khmer OS System';">
                        {{$tmppo->productlist->khname}}
                    </td>
                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                        {{$tmppo->qty}}
                    </td>
                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                        <?php
                        echo "$ " . number_format($tmppo->unitPrice,2);
                        ?>
                    </td>
                    <td width="150px" style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                        <?php
                        echo "$ " . number_format($tmppo->amount,2);
                        ?>
                    </td>
                    <td width="150px" style="text-align: center;">
                        <a style="padding: 2px" class="btn btn-danger btn-xs cursor-pointer " type="button" title="Remove Product" onclick="remove({{$tmppo->id}})"><i class="fa fa-remove"></i> Remove</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-2" style="margin-top: 5px;">
                    <label class="center">Discount (%):</label>
                </div>
                <div class="col-lg-1">
                    {!! Form::text('discount',null,['class'=>'edit-form-control','id'=>'discount','autocomplete'=>'off']) !!}
                    <div class="error">
                        <span style="padding: 3px;margin-top: 0px;"></span>
                    </div>
                </div>
                <div class="col-lg-5">
                </div>
                <div class="col-lg-2" style="margin-top: 5px;">
                    <label class="center">Total Amount ($):</label>
                </div>
                <div class="col-lg-2" style="margin-top: 5px;">
                    {!! Form::hidden('totalAmount',$totalAmount,['class'=>'totalAmount' ]) !!}
                    <div>$ {{number_format($totalAmount,2)}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-2">
                    <label class="center">COD (%):</label>
                </div>
                <div class="col-lg-1">
                    {!! Form::text('cod',null,['class'=>'edit-form-control','id'=>'cod','autocomplete'=>'off']) !!}
                    <div id="errorcod">
                        <span style="padding: 3px;margin-top: 0px;"></span>
                    </div>
                </div>
                <div class="col-lg-5">
                </div>
                <div class="col-lg-2" style="margin-top: 5px;">
                    <label>Grand Total ($) :</label>
                </div>
                <div class="col-lg-2">
                    {!! Form::hidden('grandTotal',null,['class'=>'grandTotal' ]) !!}
                    <div id="gto">$ {{number_format($totalAmount,2)}}</div>
                </div>
            </div>

        </div>
    </div>
@else
    <h4 class="center text-red">No found record!</h4>
@endif
<script>
    $(document).ready(function () {
        var totalAmount = 0;
        totalAmount = $('.totalAmount').val();
        if(totalAmount){
            $('.MaintotalAmount').val(totalAmount);
        }else {
            $('.MaintotalAmount').val(0);
        }

    });
    $('#discount').keyup(function () {
        var discount = $(this).val();
        $('#cod').css('border','1px solid lightblue');
        $('#errorcod').html("<span style='margin-top: 0px;padding: 3px;'></span>");
        $('#cod').val(0);
        var totalAmount = $('.totalAmount').val();
        var dis = parseInt(discount);
        if(dis>=0 && dis<=100){
            $('#discount').css('border','1px solid lightblue');
            $('.error').html("<span style='margin-top: 0px;padding: 3px;'></span>");
            var gTotal = totalAmount - totalAmount*discount/100;
            var grandTotal = gTotal.toFixed(2);
            $('#gto').html("<div>$ "+grandTotal+"</div>");
            $('.Maindiscount').val(discount);
            $('.Maincod').val(0);
            $('.MaintotalAmount').val(totalAmount);
            $('.MaingrandTotal').val(grandTotal);
            $('.btnSave').removeAttr('disabled','true');
            $('.error').html("<span class='text-danger' style='margin-top: 0px;padding: 3px;'></span>");
        }else{
            $('#discount').css('border','1px solid red');
            $('.error').html("<span class='text-danger' style='margin-top: 0px;padding: 3px;'>Invalid</span>");
            $('#gto').html("<div>$ 0.00</div>");
            $('.Maindiscount').val(0);
            $('.Maincod').val(0);
            $('.maintotalamount').val(0);
            $('.MaingrandTotal').val(0);
            $('.btnSave').attr('disabled','true');


        }
    });
    $('#cod').keyup(function () {
        var co = $(this).val();
        var totalAmount = $('.totalAmount').val();
        var dis = $('#discount').val();
        var discount = parseInt(dis);
        var cod = parseInt(co);
        if(discount!='' &&discount>=0 && discount<=100){
            $('#discount').css('border','1px solid lightblue');
            $('.error').html("<span style='margin-top: 0px;padding: 3px;'></span>");
        }else{
            $('#discount').val(0);
            $('#discount').css('border','1px solid lightblue');
            $('.error').html("<span style='margin-top: 0px;padding: 3px;'></span>");
        }
        if(cod>=0 && cod<=100){
            $('#cod').css('border','1px solid lightblue');
            $('#errorcod').html("<span style='margin-top: 0px;padding: 3px;'></span>");
            var dis = $('#discount').val();
            var gTotal = totalAmount - totalAmount*dis/100;
            var grand = gTotal - gTotal*cod/100;
            var grandTotal = grand.toFixed(2);
            $('#gto').html("<div>$ "+grandTotal+"</div>");
            $('.Maindiscount').val(discount);
            $('.Maincod').val(cod);
            $('.MaintotalAmount').val(totalAmount);
            $('.MaingrandTotal').val(grandTotal);
            $('.btnSave').removeAttr('disabled','true');
            $('#errorcod').html("<span style='margin-top: 0px;padding: 3px;'></span>");
        }else{
            $('#cod').css('border','1px solid red');
            $('#errorcod').html("<span class='text-danger' style='margin-top: 0px;padding: 3px;'>Invalid</span>");
            $('#gto').html("<div>$ 0.00</div>");
            $('.Maindiscount').val(discount);
            $('.Maincod').val(0);
            $('.MaintotalAmount').val(totalAmount);
            $('.MaingrandTotal').val(0);
            $('.btnSave').attr('disabled','true');
        }
    });

</script>