<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius: 7px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Stock In History
        </div>
        <div class="modal-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="center">Quantities</th>
                        <th class="center">Landing Price</th>
                        <th class="center">Manufacture</th>
                        <th class="center">Expired Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($his as $h)
                        <tr>
                            <th>{{$h->productlist->engname}}</th>
                            <th class="center">{{$h->qty}}</th>
                            <th class="center">{{"$ ".$h->landinprice}}</th>
                            <th class="center">{{\Carbon\Carbon::parse($h->mdf)->format('d-M-Y')}}</th>
                            <th class="center">{{\Carbon\Carbon::parse($h->expd)->format('d-M-Y')}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>