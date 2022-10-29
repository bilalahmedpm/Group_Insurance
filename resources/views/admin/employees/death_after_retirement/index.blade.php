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
                            <a href="{{route('entry.death_after_retirement')}}" style="margin-left: 30px;"  class="btn btn-primary btn-sm float-right">Add R&D</a>
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
                                            <td> <span class="right badge badge-danger">Not Verified</span></td>
                                        @else
                                            <td> <span class="right badge badge-success">Verified</span></td>
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
                                                @if($row->beneficiaries != 1)
                                                    {{$key +1}} :
                                                @endif
                                                {{$row1->heirname}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                @if($row->beneficiaries != 1)
                                                    {{$key +1}} :
                                                @endif
                                                {{$row1->relation->relation_desc}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                @if($row->beneficiaries != 1)
                                                    {{$key +1}} :
                                                @endif
                                                {{$row1->bank->name}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                @if($row->beneficiaries != 1)
                                                    {{$key +1}} :
                                                @endif
                                                {{$row1->branch->branch_desc}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($row->legals as $key =>  $row1)
                                                @if($row->beneficiaries != 1)
                                                    {{$key +1}} :
                                                @endif
                                                {{number_format($row1->amount)}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <!-- edit section -->
                                            <a href="#"
                                               class="btn btn-sm btn-primary"
                                               title="edit">
                                                <i class="fa fa-pen"></i> Edit
                                            </a>
                                            <a href="{{route('death.after.view' ,$row->id)}}"
                                               class="btn btn-sm btn-primary"
                                               title="edit">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                            <!-- Delete section -->
                                            <a href="{{route('employee.show' ,$row->id)}}" id="delete"
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
@endsection

