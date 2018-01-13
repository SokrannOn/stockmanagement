
<div class="modal-dialog">
    <div class="modal-content" style="border-radius: 5px; width: 80%; margin: auto">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Customer Details</h4>
        </div>
        <div class="modal-body">
            <table width="100%" border="0px" class="table table-condensed">
                <tr>
                    <td>Khmer Name</td>
                    <td>{{$customer->khname}}</td>
                </tr>
                <tr>
                    <td>English Name</td>
                    <td>{{$customer->engname}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{$customer->contact}}</td>
                </tr>
                <tr>
                    <td>Province Name</td>
                    <td>{{$customer->village->commune->district->province->name}}</td>
                </tr>
                <tr>
                    <td>District Name</td>
                    <td>{{$customer->village->commune->district->name}}</td>
                </tr>
                <tr>
                    <td>Commune Name</td>
                    <td>{{$customer->village->commune->name}}</td>
                </tr>
                <tr>
                    <td>Village Name</td>
                    <td>{{$customer->village->name}}</td>
                </tr>
                <tr>
                    <td>Home No</td>
                    <td>{{$customer->homeno}}</td>
                </tr>
                <tr>
                    <td>Street No</td>
                    <td>{{$customer->streetno}}</td>
                </tr>
                <tr>
                    <td>Channel Name</td>
                    <td>{{$customer->channel->name}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>





