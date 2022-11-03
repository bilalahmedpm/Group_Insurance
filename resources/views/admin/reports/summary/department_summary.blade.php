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


                            <?php $totalamount = 0;  ?>
                            <div class="card-header">
{{--                                <h6 style="text-transform: uppercase; font-weight: bold;font-size: medium" class="card-title"> <u>{{$key+1}} :{{$row->department_desc}}</u></h6>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm table-bordered" width="100%">
                                    <thead>
                                    <tr>
                                        <th width="2%">Department</th>
                                        <th width="5%">Number of Employees</th>
                                        <th width="8%">Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>



                                            <tr>
                                                @foreach($count as $row)


                                                <td width="2%" >{{$row->department->department_desc}}</td>
                                                <td width="5%" >{{$row->legals_count}}</td>
                                                <?php $sum = App\Legalheir::where('employee_id', $row->id)->sum('amount')?>
                                                <td width="8%">{{$sum}}</td>
{{--                                                <td width="8%">{{$row->legals->sum('amount')}}</td>--}}

                                            </tr>

                                    @endforeach

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

