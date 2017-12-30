@extends('admin.master')
@section('content')
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create Category
            </div>
            <div class="panel-body">
                <div class="row">
                    {!! Form::open(['action'=>'CategoryController@store','method'=>'post']) !!}
                    <input type="hidden" value="{{csrf_token()}}">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Category Name')!!}
                                    {!! Form::text('name',null,['class'=>'edit-form-control'])!!}
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                                    {{$errors->first('name')}}
                                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Description')!!}
                                    {!! Form::text('description',null,['class'=>'edit-form-control'])!!}
                                    @if($errors->has('description'))
                                        <span class="text-danger">
                                                    {{$errors->first('description')}}
                                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create',['class'=>'btn btn-primary btn-sm']) !!}
                            {!! Form::reset('Reset',['class'=>'btn btn-warning btn-sm']) !!}
                        </div>

                    </div>
                    {!! Form::close() !!}
                    <div class="col-md-8">
                        <label for="">List views</label>
                        <div class="form-group">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th style="width:20%; !important;" class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($category as $c)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->description}}</td>
                                        <td>{{\App\User::where('id',$c->user_id)->value('name')}}</td>
                                        <td class="center">
                                            <a href="#" onclick="editCategory('{{$c->id}}')" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm">Edit</a>
                                            <a href="{{url('/admin/category/delete',[$c->id])}}" class="btn btn-danger btn-xs">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div id="editCategory">

                    </div>
                </div>

            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function editCategory(id) {
            $.ajax({
                type:'get',
                url:"{{url('/admin/category/edit')}}"+"/"+id,
                dataType:'html',
                success:function (data) {
                    $('#editCategory').html(data);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection