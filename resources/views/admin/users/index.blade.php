@extends('admin.layouts.include')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php $user = Auth::user(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <button style="margin-left: 30px;" class="btn btn-primary btn-sm float-right"
                                    data-toggle="modal" data-target="#exampleModal">Add New User
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Cnic #</th>
                                    <th>Phone #</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $row)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->cnic}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->department->department_desc}}</td>
                                        <td> <span class="right badge badge-success">{{$row->status}}</span></td>
                                        <td>
                                            @if($row->role=='1')
                                                <span class="right badge badge-success">Super Admin</span>
                                            @elseif($row->role=='2')
                                                <span class="right badge badge-success">Admin</span>
                                            @elseif($row->role=='3')
                                                <span class="right badge badge-success">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('user.edit' ,$row->id)}}" data-toggle="modal"
                                               data-target="#useredit{{$row->id}}" class="btn btn-sm btn-primary"
                                               title="edit">
                                                <i class="fa fa-pen"></i> Edit
                                            </a>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="useredit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('user.update',$row->id)}}"
                                                                  method="post" enctype="multipart/form-data"
                                                                  data-parsley-validate>
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title"><b>User Name</b><span class="text-danger">*</span></label>
                                                                        <input type="text" name="name" value="{{$row->name}}" required placeholder="User Name" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="title"><b>CNIC</b><span class="text-danger">*</span></label>
                                                                        <input type="text" name="cnic" value="{{$row->cnic}}" required placeholder="544##########" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="title"><b>Phone No</b><span class="text-danger">*</span></label>
                                                                        <input type="text" name="phone" value="{{$row->phone}}" required placeholder="03#########" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Role</label>
                                                                        <select class="form-control  select2" name="role" style="width: 100%;"
                                                                                required>
                                                                            <option selected="selected"  disabled>Select Role</option>
                                                                            <option value="1" {{ $row->role == '1'? 'selected' : '' }}>Super Admin</option>
                                                                            <option value="2" {{ $row->role == '2' ? 'selected' : '' }}>Admin</option>
                                                                            <option value="3" {{ $row->role == '3' ? 'selected' : '' }}>User</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select class="form-control  select2" name="status" style="width: 100%;" required>
                                                                            <option selected="selected" disabled>Select Status</option>
                                                                            <option value="active" {{ $row->status == 'active'? 'selected' : '' }}>Active</option>
                                                                            <option value="inactive"{{ $row->status == 'inactive'? 'selected' : '' }}>In Active</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 pull-right">
                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block">Update
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- End of Edit Modal -->

                                            <!-- Delete section -->
                                            <a href="{{route('user.show' ,$row->id)}}" id="delete"
                                               class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                <i class="fa fa-times"></i> Delete
                                            </a>
                                            <!-- End of delete -->
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Add new user Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Add New User Modal -->
                <div class="modal-body">
                    <form action="{{route('user.store')}}" method="post" data-parsley-validate>
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>User Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="name" required placeholder="User Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>Email Address</b><span class="text-danger">*</span></label>
                                <input type="email" name="email" required placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>Password</b><span class="text-danger">*</span></label>
                                <input type="password" name="password" required placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>CNIC</b><span class="text-danger">*</span></label>
                                <input type="text" name="cnic" required placeholder="544##########" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>Phone No</b><span class="text-danger">*</span></label>
                                <input type="text" name="phone" required placeholder="03#########" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control  select2" name="department" style="width: 100%;"
                                        required>
                                    <option selected="selected" disabled>Select Department</option>
                                    @foreach( $departments as $department)
                                        <option
                                            value="{{$department->id}}">{{{$department->department_desc}}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control  select2" name="role" style="width: 100%;"
                                        required>
                                    <option selected="selected" disabled>Select Role</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">User</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control  select2" name="status" style="width: 100%;" required>
                                    <option selected="selected" disabled>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>

                                </select>
                            </div>
                        </div>


                        <div class="col-md-12 pull-right">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>
    <!-- End of new Bank Modal -->
@endsection
