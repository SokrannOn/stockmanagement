 <div class="table-responsive">
    <table id="customer_table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">No</th>
            <th>Khmer Name</th>
            <th>English Name</th>
            <th class="center">Contact</th>
            <th class="center">Channel</th>
            <th>Province</th>
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
                <td class="center">{{$c->channel->name}}</td>
                <td>{{$c->village->commune->district->province->name}}</td>
                <td class="center">
                    <a href="#" onclick='viewCustomer("{{$c->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myPopup"><i class="fa fa-eye" style="color: #0b93d5;"></i></a>
                    <a href="#" onclick='editCustomer("{{$c->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" style="color: #d59b0a"></i></a>
                    <a href="#" style="padding: 5px;" onclick='deleteCustomer("{{$c->id}}")'><i class="fa fa-trash" style="color: red;"></i></a>
                </td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>