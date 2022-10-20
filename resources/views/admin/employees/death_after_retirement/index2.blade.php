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
                            <h3 class="card-title" >DataTable with default features</h3>

                    </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Personal #</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Cnic</th>
                                    <th>Department</th>
                                    <th>Post/Grade</th>
                                    <th>Status</th>
                                    <th>Gitype</th>
                                    <th >Beneficiary Name</th>
                                    <th >Relation</th>
                                    <th >Bank</th>
                                    <th >Branch</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $row)

                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->pno}}</td>
                                        <td>{{$row->employeename}}</td>
                                        <td>{{$row->fathername}}</td>
                                        <td>{{$row->employeecnic}}</td>
                                        <td>{{$row->department->department_desc}}</td>
                                        <td>{{$row->designation->designation_desc}} - ({{$row->grade}})</td>
                                        @if($row->status==0)
                                            <td> <span class="right badge badge-warning">Not Verified</span></td>
                                        @elseif($row->status==1)
                                            <td> <span class="right badge badge-success">Verified/span></td>
                                         @elseif($row->status==3)
                                            <td> <span class="right badge badge-danger">Objection</span></td>
                                        @endif
                                        <td>
                                            @if($row->gitype=='01')
                                                <span class="right badge badge-success">Retirement</span>
                                            @elseif($row->gitype=='02')
                                                <span class="right badge badge-success">Death</span>
                                            @elseif($row->gitype=='03')
                                                <span class="right badge badge-success">Death after Retirement</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                {{$key +1}} : {{$row1->heirname}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                {{$key +1}} : {{$row1->relation->relation_desc}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                {{$key +1}} : {{$row1->bank->name}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                {{$key +1}} : {{$row1->branch->branch_desc}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                {{$key +1}} : {{$row1->amount}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <!-- edit section -->
                                            <a href="{{route('death.edit' ,$row->id)}}"
                                               class="btn btn-sm btn-success"
                                               title="edit">
                                                <i class="fa fa-pen"></i> Edit
                                            </a>
                                            <a  data-toggle="modal" data-target="#exampleModal{{$row->id}}"
                                               class="btn btn-sm btn-primary"
                                               title="edit">
                                                <i class="fa fa-eye"></i> Objection
                                            </a>

                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Details Objection</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data"
                                                              data-parsley-validate>
                                                            @csrf
                                                            <?php $obj = \App\objection::where('employee_id','=',$row->id)->orderBy('id','DESC')->get();?>
                                                            @foreach($obj as $key=>$row)
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title"><b>Objecti#{{$key+1}} </b><span class="text-danger">*</span></label>
                                                                        <textarea readonly placeholder="Description" class="form-control" name="description">{{$row->description}}</textarea>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <div class="col-md-12 pull-right">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>

                                        </div></div>

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
@endsection

