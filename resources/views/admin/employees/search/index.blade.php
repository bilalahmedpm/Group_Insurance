@extends('admin.layouts.include')
@section('styles')
    <style>
        th {
            text-align:left;
            text-transform: uppercase;
            vertical-align: text-top;
            font-size: small;
        }

        td {
            text-align: left;
            text-transform: uppercase;
            font-size: small;
        }
    </style>
@endsection
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
                                <a href="#" style="margin-left: 30px;"  class="btn btn-primary btn-sm float-right">Add New Retirement Claim </a>
                            </div>
                            <!-- /.card-header -->
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
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($employees as $row)
                                        @foreach($row->legals as $row1)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->pno}}</td>
                                                <td>{{$row->employeename}}</td>
                                                <td>{{$row->fathername}}</td>
                                                <td>{{$row->employeecnic}}</td>
                                                <td>{{$row->department->department_desc}}</td>
                                                <td>{{$row->designation->designation_desc}} <br>
                                                    BPS-({{$row->grade}})</td>
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
                                                <td >{{$row1->heirname}}  </td >
                                                <td >{{$row1->relation->relation_desc}} </td >
                                                <td >{{$row1->bank->name}}  </td >
                                                <td >{{$row1->branch->branch_desc}}</td >
                                                <td >{{number_format($row1->amount)}} </td >

                                            </tr>

                                        @endforeach
                                    @endforeach
                                    </tbody>

                                </table>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
