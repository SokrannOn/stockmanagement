@if($tmpdata->count())
    <div class="panel panel-default table-responsive">
        <table class="table table-bordered table-hover table-striped" cellspacing="0">
            <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Product Name</th>
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
                    <td style="font-size: 11px; font-family: 'Khmer OS System';">
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
                        <button style="padding: 2px" class="btn btn-danger fa fa-remove btn-xs poid" type="button" onclick="removeOrderCus({{$tmppo->id}})"> Remove</button></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm' ]) !!}
            {!! Form::reset('Discard',['class'=>'btn btn-danger btn-sm' ]) !!}
        </div>
    </div>
@else
    <h4 class="center text-red">No found record!</h4>
@endif