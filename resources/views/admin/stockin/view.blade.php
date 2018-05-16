@extends('admin.master')

@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                View Stock In
            </div>
            <div class="panel-body">
                <table class="table table-hover" id="stockinView">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="center">Stock In Number</th>
                            <th class="center">Stock In Date</th>
                            <th class="center">Invoice Number</th>
                            <th class="center">Invoice Date</th>
                            <th>Supplier</th>
                            <th class="center">Discount</th>
                            <th class="center">Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($im as $ims)
                        <tr>
                            <td>{{$i++}}</td>
                            <td class="center">{{$ims->id}}</td>
                            <td class="center">{{\Carbon\Carbon::parse($ims->importdate)->format('d-M-Y')}}</td>
                            <td class="center">{{$ims->invnumber}}</td>
                            <td class="center">{{\Carbon\Carbon::parse($ims->invdate)->format('d-M-Y')}}</td>
                            <td>{{$ims->supply->name}}</td>
                            <td class="center">{{$ims->discount." %"}}</td>
                            <td class="center">{{"$ ".$ims->totalAmount}}</td>
                            <td>
                                <a class="cursor-pointer padding-7" title="View" onclick='viewDetail("{{$ims->id}}")' data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></a>
                                <a class="cursor-pointer padding-7" title="History" onclick='historyView("{{$ims->id}}")' data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-history"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div id="view">

                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
           $('#stockinView').dataTable()
        });


        function viewDetail(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/stock/view/detail/')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#view').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

        function historyView(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/stock/view/history/')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#view').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }

    </script>
@endsection