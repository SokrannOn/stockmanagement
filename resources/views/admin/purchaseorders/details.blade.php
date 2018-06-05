<div class="modal-dialog">
    <div class="modal-content" style="border-radius:5px;">
        <div class="modal-header">
            Details
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th class="center">Qty</th>
                    <th class="center">Unit Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details->productlists as $p)
                    <tr>
                        <td style="font-family: 'Khmer OS System'; font-size: 11px;">{{$p->khname}}</td>
                        <td class="center">{{$p->pivot->qty}}</td>
                        <td class="center">{{$p->pivot->unitPrice}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>