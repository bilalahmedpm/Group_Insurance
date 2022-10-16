@extends('admin.layouts.include')
@section('styles')
    <style>
        th
        {
        text-align: center;
        }
        td{
            text-align: center;
            vertical-align: top;
        }
    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @foreach($departments as $key => $row)
                        <?php $totalamount = 0; ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$key+1}}  : {{$row->department_desc}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm table-bordered"  width="100%">
                                <thead>
                                <tr>
                                    <th width="2%">ID</th>
                                    <th width="8%" >Personal # / <br>Employee Name</th>
                                    <th width="8%">Father Name</th>
                                    <th width="7%" >Department</th>
                                    <th width="7%" >Designation</th>
                                    <th width="3%" >Gitype</th>
                                    <th>User</th>
                                    <th>Legalheir Name</th>
                                    <th>Legalheir CNIC</th>
                                    <th>Bank</th>
                                    <th>Branch</th>
                                    <th width="12%">Account #</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>

                                <tbody>
                               @foreach($row->employees as  $row1)
                               @foreach ($row1->legals as $row2)

                                <tr>
                                    <td>{{$row1->id}}</td>
                                    <td style="text-align: center">{{$row1->pno}}<br>{{$row1->employeename}}</td>
                                    <td>{{$row1->fathername}}</td>
                                    <td>{{$row1->department->department_desc}}</td>
                                    <td>{{$row1->designation->designation_desc}}</td>
                                    <td>{{$row1->gitype}}</td>
                                    <td>{{$row1->user->name}}</td>
                                    <td>{{$row2->heirname}}</td>
                                    <td>{{$row2->heircnic}}</td>
                                    <td>{{$row2->bank->name}}</td>
                                    <td>{{$row2->branch->branch_desc}}</td>
                                    <td style="width: 60px">{{$row2->accountno}}</td>
                                    <td>{{$row2->amount}}</td>
                                </tr>
                                <?php $totalamount +=  $row2->amount ++ ?>
                               @endforeach
                          </tbody>
                       @endforeach
                                <tr>
                                    <td colspan="12"><h6 style="text-align: right">Total Amount :</h6></td>
                                    <td colspan="13"><h6 style="float: right">{{$totalamount}}</h6></td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
         @endforeach
                </div>

                <!-- /.col -->


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
