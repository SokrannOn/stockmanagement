<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="center">ID</th>
                <th>Khmer Name</th>
                <th>English Name</th>
                <th class="center">Contact</th>
                <th class="center">Channel</th>
                <th>Province</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="center">{{'CAM-CUS-'.sprintf('%06d',$customer->id)}}</td>
                <td>{{$customer->khname}}</td>
                <td>{{$customer->engname}}</td>
                <td class="center">{{$customer->contact}}</td>
                <td class="center">{{$customer->channel->name}}</td>
                <td>{{$customer->village->commune->district->province->name}}</td>
            </tr>
        </tbody>
    </table>
</div>