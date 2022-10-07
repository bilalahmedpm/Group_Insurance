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
                                    data-toggle="modal" data-target="#exampleModal">Add Bank Branch
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S # </th>
                                    <th>Bank</th>
                                    <th>Branch Code</th>
                                    <th>Branch Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($branches as $key => $row)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$row->bank->name}}</td>
                                        <td>{{$row->branch_code}}</td>
                                        <td>{{$row->branch_desc}}</td>
                                        <td>
                                            <a href="{{route('branch.edit' ,$row->id)}}" data-toggle="modal"
                                               data-target="#branchedit{{$row->id}}" class="btn btn-sm btn-primary"
                                               title="edit">
                                                <i class="fa fa-pen"></i> Edit
                                            </a>
                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="branchedit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Branch</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('branch.update',$row->id)}}"
                                                                  method="post" enctype="multipart/form-data"
                                                                  data-parsley-validate>
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <label>Bank Name</label>
                                                                    <select class="form-control  select2" name="bank" style="width: 100%;"
                                                                            data-parsley-required>
                                                                        <option selected="selected" disabled>Select Bank</option>
                                                                        @foreach( $banks as $bank)
                                                                            <option
                                                                                value="{{$bank->id}}" {{ ( $bank->id == $row->bank_id) ? 'selected' : '' }}>{{{$bank->name}}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title"><b>Branch Code</b><span class="text-danger">*</span></label>
                                                                        <input type="text" value="{{$row->branch_code}}" name="branch_code" required placeholder="Branch Code"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title"><b>Branch Address</b><span class="text-danger">*</span></label>
                                                                        <input type="text"  value="{{$row->branch_desc}}" name="branch_desc" required placeholder="Branch Address"
                                                                               class="form-control">
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
                                            <a href="{{route('branch.show' ,$row->id)}}" id="delete"
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

    <!-- Add new Bank Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Add New Bank Modal -->
                <div class="modal-body">
                    <form action="{{route('branch.store')}}" method="post" data-parsley-validate>
                        @csrf

                        <div class="col-md-12">
                            <label>Bank Name</label>
                            <select class="form-control  select2" name="bank" style="width: 100%;"
                                    data-parsley-required>
                                <option selected="selected" disabled>Select Bank</option>
                                @foreach( $banks as $bank)
                                    <option
                                        value="{{$bank->id}}">{{{$bank->name}}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Branch Code</b><span class="text-danger">*</span></label>
                                <input type="text" name="branch_code" required placeholder="Branch Code"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Branch Address</b><span class="text-danger">*</span></label>
                                <input type="text" name="branch_desc" required placeholder="Branch Address"
                                       class="form-control">
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
