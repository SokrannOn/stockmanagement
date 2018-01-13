
 @if(count($supplier))
     <table id="supplier" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php $i=1; ?>
            @foreach($supplier as $sup)
                <tr>
                    <td class="center">{{$i++}}</td>
                    <td>{!! $sup->name !!}</td>
                    <td>{!! $sup->email !!}</td>
                    <td>{!! $sup->contactnumber !!}</td>
                    <td>{!! $sup->address !!}</td>
                    <td>
                        <a href="#" style="padding: 5px;"><i class="fa fa-edit"></i></a>
                        <a href="#" style="padding: 5px;"><i class="fa fa-trash" style="color: red;"></i></a>

                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
 @else
     <h3>No record</h3>
 @endif