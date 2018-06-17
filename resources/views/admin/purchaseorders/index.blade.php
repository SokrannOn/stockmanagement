@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Purchaseorder List</div>
            <div class="panel-body">
                <div class="table-responsive">
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
                        <?php $no = 1;?>
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
                                    echo "$ " . number_format($po->totalAmount, 2);
                                    ?>
                                </td>
                                <td width="150px"
                                    style="font-size: 11px; font-family: 'Khmer OS System'; text-align: center;">
                                    <?php
                                    echo "$ " . number_format($po->grandTotal, 2);
                                    ?>
                                </td>
                                <td width="150px" style="text-align: center;">
                                    <a style="padding: 2px" class="btn btn-info btn-xs cursor-pointer "
                                       onclick="details({{$po->id}})" data-toggle="modal"
                                       data-target="#details">Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div id="details" class="modal fade" role="dialog">

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
                url: "{{url('/get/po/details')}}" + '/' + id,
                dataType: 'html',
                success: function (data) {
                    $('#details').html(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection


