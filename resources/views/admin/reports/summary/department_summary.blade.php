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
            <div class="row" id="contentToConvert_pdf">
                <div class="col-md-12">
                    <div class="card">
                    <?php $grandTotal=0; ?>
                    <div class="card">
                        <div style="text-align: right; padding: 10px;">
                            <a href="" style="float: right; margin-right: 50px; margin-top: 10px;" class="btn btn-primary">Download PDF</a>

                            <h5 style="text-decoration: underline; text-align: center">Group Insurance <br> Department Wise Summary</h5>
                        </div>
                    </div>
                            <div class="card-header">
{{--                                <h6 style="text-transform: uppercase; font-weight: bold;font-size: medium" class="card-title"> <u>{{$key+1}} :{{$row->department_desc}}</u></h6>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="2%">Department</th>
                                        <th width="5%">Number of Cases</th>
                                        <th width="8%">Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $totalamount = 0; ?>
                                    <?php $numberofcases = 0;  ?>
                                    @foreach($department_summary as $row)
                                        <tr>
                                            <td width="2%">{{$row->department_desc}}</td>
                                            <td width="5%">{{$row->numberofcases}}</td>
                                            <td width="8%">{{number_format($row->totalamount)}}</td>
                                                <?php $totalamount += $row->totalamount ?>
                                                <?php $numberofcases += $row->numberofcases ?>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td style="text-align:center;padding-right: 15px; font-weight: bold;">Total :</td>
                                        <td  style="font-weight: bold;">{{number_format($numberofcases)}}</td>
                                        <td  style="font-weight: bold;">{{number_format($totalamount)}}</td>
                                    </tr>
{{--                                    @foreach($count as $row)--}}
{{--                                        @foreach($row->employees as $row1)--}}
{{--                                            <tr>--}}

{{--                                                        <?php $legalsum = App\Legalheir::where('employee_id', $row1->id)->sum('amount');?>--}}
{{--                                                        <?php $legalscount = App\Legalheir::where('employee_id', $row1->id)->count() ;?>--}}
{{--                                                <td width="2%" >{{$row->department_desc}}</td>--}}
{{--                                                <td width="5%" >{{$legalscount}}</td>--}}
{{--                                                    <td width="8%">{{$legalsum}}</td>--}}
{{--                                                <td width="8%">{{$row->legals->sum('amount')}}</td>--}}
{{--                                            </tr>--}}

{{--                                    @endforeach--}}
{{--                                    @endforeach--}}

                                    </tbody>

                                </table>
                            </div> <!-- /.card-body -->
                            <!-- /.card -->

                    </div>
                </div>

            </div><!-- /.col -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

