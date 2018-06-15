@if(count($im))
    <div class="panel panel-default">
        <div class="container-fluid">
            <div id="printReport" style="padding: 10px">
                <div style="padding: 5px">
                    <h3 STYLE="font-family: 'Times New Roman', serif">Stock In Report</h3>
                    <span> Date : {{\Carbon\Carbon::parse($start)->format('d/M-Y')." To ".\Carbon\Carbon::parse($end)->format('d/M/Y')}}</span>
                    <table border="1" cellspacing="10" width="100%" cellpadding="50" style="margin-top: 10px; border: 1px solid grey">
                        <tr>
                            <th style="padding: 4px 7px">Product Name</th>
                            <th style="text-align: center; padding: 4px 7px; width: 7%">Import #</th>
                            <th style="text-align: center; width:5%;">QTY</th>
                            <th width="15%" style="text-align: center">Landing Price</th>
                            <th style="text-align: center">MDF</th>
                            <th style="text-align: center;">EXP</th>
                        </tr>
                        @foreach($im as $item)
                            <tr>
                                <td style="padding: 4px 7px; font-family: 'Khmer OS Content'">{{$item->productlist->khname}}</td>
                                <td style="text-align: center; ">{{$item->import_id}}</td>
                                <td style="padding: 4px 7px; font-family: 'Times New Roman'; text-align: center;">{{$item->qty}}</td>
                                <td style="padding: 4px 7px; text-align: center;">{{"$ ".$item->landinprice}}</td>
                                <td style="text-align: center; width: 15%;">{{\Carbon\Carbon::parse($item->mdf)->format('d-M-Y')}}</td>
                                <td style="text-align: center; width: 15%;">{{\Carbon\Carbon::parse($item->exp)->format('d-M-Y')}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <a href="#" style="size: 35px"><i class="fa fa-print" style="height: 16px"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    <span class="text text-danger">No Content</span>
@endif