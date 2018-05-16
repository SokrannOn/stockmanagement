
@if(count($stockin))
    <table id="supplier" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Manufacture Date</th>
                <th>Expired Date</th>
                <th class="center">Quantities</th>
            </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($stockin as $s)
            <tr>
                <td>{{$i++}}</td>
                <td>{{\App\Productlist::where('id',$s['productid'])->value('productcode')}}</td>
                <td>{{\App\Productlist::where('id',$s['productid'])->value('khname')}}</td>
                <td>{{\Carbon\Carbon::parse($s['mfd'])->format('d-M-Y')}}</td>
                <td>{{\Carbon\Carbon::parse($s['expd'])->format('d-M-Y')}}</td>
                <td class="center">{{$s['qty']}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm','style'=>'width:70px']) !!}
            <a href="#" class="btn btn-danger btn-sm" style="width: 70px;" onclick="discardRecord()">Discard</a>
        </div>
    </div>
@endif

