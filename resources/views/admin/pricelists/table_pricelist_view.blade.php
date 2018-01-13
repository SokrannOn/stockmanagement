 <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="center">No</th>
                <th class="center">Product Code</th>
                <th>Product Name</th>
                <th class="center">FoB Price</th>
                <th class="center">Margin</th>
                <th class="center">Landing Price</th>
                <th class="center">Selling Price</th>
                <th class="center">Begin Date</th>
                <th class="center">End Date</th>
                <th class="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach($pricelist as $p)
                <tr>
                    <td class="center">{{$i++}}</td>
                    <td class="center">{{$p->productlist->productcode}}</td>
                    <td>{{str_limit($p->productlist->khname,25)}}</td>
                    <td class="center">{{"$ " . $p->fobprice}}</td>
                    <td class="center">{{$p->margin . " %"}}</td>
                    <td class="center">{{"$ " . $p->landingprice}}</td>
                    <td class="center">{{"$ " . $p->sellingprice}}</td>
                    <td class="center">{{Carbon\Carbon::parse($p->startdate)->format('d-M-Y')}}</td>
                    <td class="center">{{Carbon\Carbon::parse($p->enddate)->format('d-M-Y')}}</td>
                    <td class="center">
                        <a href="#" onclick='editPrilist("{{$p->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" style="color: #d59b0a"></i></a>
                        <a href="#" style="padding: 5px;" onclick='deletePricelist("{{$p->id}}")'><i class="fa fa-trash" style="color: red;"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>