<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th class="center">User ID</th>
            <th class="center">Photo</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Role</th>
            <th>Module</th>
            <th style="width:20%; !important;" class="center">Action</th>
        </tr>
        </thead>
        <tbody>

            <?php $i=1;?>
            @foreach($user as $u)
            <tr>
                <td style="line-height: 50px;" class="center">{{$i++}}</td>
                <td class="center"><img src='{{asset("photo/$u->photo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                <td style="vertical-align: middle;">{{$u->name}}</td>
                <td style="vertical-align: middle;">{{$u->username}}</td>
                <td style="vertical-align: middle;">{{$u->position->name}}</td>
                <td style="vertical-align: middle;">{{$u->email}}</td>
                <td style="vertical-align: middle;">{{$u->role->name}}</td>
                <td style="vertical-align: middle;">
                    @foreach($u->modules as $m)
                        <span class="label label-success">{{$m->module}}</span>
                    @endforeach
                </td>
                <td style="vertical-align: middle;" class="center">
                    @if(\App\PermissionUser::edit())
                    <a href="#" onclick='editUser("{{$u->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
                    <a href="#" onclick='resetPassword("{{$u->id}}")' data-toggle="modal" data-target=".bs-example-modal-sm" style="padding: 5px;"><i class="fa fa-refresh"></i></a>
                    @endif
                    @if(\App\PermissionUser::delete())
                        <a href="#" style="padding: 5px;" onclick='deleteUser("{{$u->id}}")'><i class="fa fa-trash" style="color: red;"></i></a>
                    @endif
                    @if(\App\PermissionUser::view())
                    <a href="#" onclick='viewUser("{{$u->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#viewUser" style="padding: 5px;"><i class="fa fa-eye" style=""></i></a>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>