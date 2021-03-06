@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Purchaseorder List</div>
            <div class="panel-body">
                <div class="table-responsive">
                    @if($purchaseorder->count())
                        <table class="table table-bordered table-hover table-striped" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="center">Number</th>
                                <th class="center">Date</th>
                                <th>Customer Name</th>
                                <th class="center">Discount</th>
                                <th class="center">COD</th>
                                <th class="center">Total Amount</th>
                                <th class="center">Grand Total</th>
                                <th class="center">Actions</th>
                            </tr>
                            </thead>
                            <?php $no=1;?>
                            <tbody>
                            @foreach($purchaseorder as $po)
                                <tr>
                                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">{{$no++}}</td>
                                    <td style="font-size: 13px; font-family: 'Khmer OS System';text-align: center;">
                                        {{$po->date}}
                                    </td>
                                    <td style="font-size: 11px; font-family: 'Khmer OS System';">
                                        {{$po->customer->engname}}
                                    </td>
                                    <td style="font-size: 13px; font-family: 'Khmer OS System';text-align: center;">
                                        {{$po->discount}} %
                                    </td>
                                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                                        {{$po->cod}} %
                                    </td>
                                    <td style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                                        <?php
                                        echo "$ " . number_format($po->totalAmount,2);
                                        ?>
                                    </td>
                                    <td width="150px" style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                                        <?php
                                        echo "$ " . number_format($po->grandTotal,2);
                                        ?>
                                    </td>
                                    <td width="150px" style="text-align: center;">
                                        <a style="padding: 2px" class="btn btn-info btn-xs cursor-pointer " onclick="details({{$po->id}})"data-toggle="modal" data-target="#details" > Details</a>
                                        <a style="padding: 2px" class="btn btn-primary btn-xs cursor-pointer" onclick="generate({{$po->id}})" data-toggle="modal" data-target=".bs-example-modal-sm" > Generate</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <h4 class="center">No Record</h4>
                    @endif
                    <div id="details" class="modal fade" role="dialog">

                    </div>
                        <div id="generate" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function details(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/get/po/details')}}"+'/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#details').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        function generate(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/get/generate/invoice')}}"+'/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#generate').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        function done(id) {
            var r = $('#rate').val();
            var d = $('#deposit').val();
            var v = $('#vat').val();
            var due = $('#due').val();
            if(!due){
                due =0;
            }
            alert(due);
            $.ajax({
                type: 'get',
                url: "{{url('/done/generate/invoice')}}"+'/'+id+'/'+r+'/'+d+'/'+v+'/'+due,
                dataType: 'html',
                success: function (data) {
                    $('#invoice').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection


