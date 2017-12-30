 <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">No</th>
            <th>Khmer Name</th>
            <th>English Name</th>
            <th class="center">Product Code</th>
            <th class="center">Product Barcode</th>
            <th>Category</th>
            <th class="center">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i=1;?>
            @foreach($productlist as $p)
                <td class="center">{{$i++}}</td>
                <td>{{$p->khname}}</td>
                <td>{{$p->engname}}</td>
                <td class="center">{{$p->productcode}}</td>
                <td class="center">{{$p->productbarcode}}</td>
                <td>{{$p->category->name}}</td>
                <td class="center">
                    <a href="#" onclick='editProlist("{{$p->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
                    <a href="#" style="padding: 5px;" onclick='deleteProductlist("{{$p->id}}")'><i class="fa fa-trash" style="color: red;"></i></a>
                </td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>