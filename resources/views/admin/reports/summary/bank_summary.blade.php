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
                    <?php $grandTotal=0; ?>
                    <div class="card">
                        <div style="text-align: center">
                            <h5 style="text-decoration: underline;">Group Insurance <br> Bank Wise Summary</h5>
                        </div>
                            <?php $totalamount = 0;  ?>
                            <div class="card-header">
{{--                                <h6 style="text-transform: uppercase; font-weight: bold;font-size: medium" class="card-title"> <u>{{$key+1}} :{{$row->department_desc}}</u></h6>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="2%">Bank Name</th>
                                        <th width="5%">Number of Cases</th>
                                        <th width="8%">Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bank_summary as $row)
                                        <tr>
                                            <td width="2%">{{$row->name}}</td>
                                            <td width="5%">{{$row->numberofcases}}</td>
                                            <td width="8%">{{number_format($row->totalamount)}}</td>

                                        </tr>
                                    @endforeach
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

