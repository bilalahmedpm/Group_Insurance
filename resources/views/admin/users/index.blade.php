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
                                        <td>{{$row->role}}</td>
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
                                                                        <label for="title"><b>User</b><span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" value="{{$row->name}}" name="name" required  placeholder="User Name" class="form-control">
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
                                <input type="text" name="email" required placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>User Name</b><span class="text-danger">*</span></label>
                                <input type="password" name="password" required placeholder="Password" class="form-control">
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
