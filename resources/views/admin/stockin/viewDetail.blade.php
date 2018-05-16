<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius: 7px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            View Detail
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
                @foreach($import as $h)
                    <tr>
                        <th>{{$h->engname}}</th>
                        <th class="center">{{$h->pivot->qty}}</th>
                        <th class="center">{{"$ ".$h->pivot->landinprice}}</th>
                        <th class="center">{{\Carbon\Carbon::parse($h->pivot->mdf)->format('d-M-Y')}}</th>
                        <th class="center">{{\Carbon\Carbon::parse($h->pivot->expd)->format('d-M-Y')}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>