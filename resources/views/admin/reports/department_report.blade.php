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
                <div class="col-md-12">

                    @foreach($departments as $key => $row)
                            <?php $totalamount = 0; ?>
                            <div class="card">
                                <div class="card-header">
                                    <h6 style="text-transform: uppercase; font-weight: bold;font-size: medium" class="card-title"> <u>{{$key+1}} :{{$row->department_desc}}</u></h6>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm table-bordered" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="2%">ID</th>
                                            <th width="5%">Personal #</th>
                                            <th width="8%">Employee Name</th>
                                            <th width="8%">Father Name</th>
                                            <th width="4%">Employee Cnic</th>
                                            <th width="5%">Department</th>
                                            <th width="7%">Designation</th>
                                            <th width="7%">Grade</th>
                                            <th width="3%">Gitype</th>
                                            <th width="7%">DOR</th>
                                            <th width="7%">DOD</th>
                                            <th width="5%">Amount</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($row->employees as  $row1)
{{--                                            @if($row1->status == 2)--}}

                                                @foreach ($row1->legals as $row2)

                                                    <tr>
                                                        <td width="2%" >{{$row2->employee_id}}</td>
                                                        <td width="5%" >{{$row1->pno}}</td>
                                                        <td width="8%">{{$row1->employeename}}</td>
                                                        <td width="8%" >{{$row1->fathername}}</td>
                                                        <td width="4%">{{$row1->employeecnic}}</td>
                                                        <td width="5%">{{$row1->department->department_desc}}</td>
                                                        <td width="7%">{{$row1->designation->designation_desc}}</td>
                                                        <td width="7%">(BPS-{{$row1->grade}})</td>
                                                        <td width="3%">
                                                            @if($row1->gitype == '01')
                                                                Retirement
                                                            @elseif($row1->gitype == '02')
                                                                Death
                                                            @elseif($row1->gitype == '03')
                                                                Death After Retirement
                                                            @endif
                                                            </td>
                                                        <td width="7%">{{$row1->retirementdate}}</td>
                                                        <td width="7%">{{$row1->dateofdeath}}</td>
                                                        <td width="5%">{{{number_format($row2->amount)}}}</td>
                                                    </tr>

                                                    <?php $totalamount += $row2->amount++ ?>

                                                @endforeach
{{--                                            @endif--}}
                                        @endforeach

                                        <tr>
                                            <td style="text-align: right;font-weight: bold" colspan="11">Total Amount :  </td>
                                            <td width="5%" colspan="12" style="text-decoration-line: underline; text-decoration-style: double;" > <h6>{{number_format($totalamount)}}</h6></td>
                                        </tr>

                                        </tbody>

                                    </table>
                                </div> <!-- /.card-body -->
                            </div>
                            <div style="float: right; margin-right: 50px;">
                            <table>
                            <tr>
                                <td><span style="font-weight: bold">Grand Total Amount :</span>&nbsp;&nbsp;<h6 style="text-decoration-line: underline; text-decoration-style: double; float: right"> Rs:    {{number_format($total)}}</h6></td>
                            </tr>
                            </table>
                            </div>                        <!-- /.card -->

                    @endforeach

                </div>




            </div><!-- /.col -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
