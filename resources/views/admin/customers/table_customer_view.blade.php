 <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">No</th>
            <th>Khmer Name</th>
            <th>English Name</th>
            <th>Contact</th>
            <th class="center">Province</th>
            <th class="center">District</th>
            <th class="center">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php $i=1;?>
            @foreach($customer as $c)
                <td class="center">{{$i++}}</td>
                <td>{{$c->khname}}</td>
                <td>{{$c->engname}}</td>
                <td class="center">{{$c->contact}}</td>
                <td class="center">{{$c->province_id}}</td>
                <td>{{$c->district_id}}</td>
                <td class="center">
                    <a href="#" onclick='editProlist("{{$c->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
                    <a href="#" style="padding: 5px;" onclick='deleteProductlist("{{$c->id}}")'><i class="fa fa-trash" style="color: red;"></i></a>
                </td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>