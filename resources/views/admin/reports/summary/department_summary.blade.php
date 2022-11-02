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
                                        <th width="5%">Number of Beneficiaries</th>
                                        <th width="8%">Total Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($count as $row)
                                        @foreach($row->employees as $row1)
                                            <tr>
                                        <?php    $legalsum = App\Legalheir::where('employee_id', $row1->id)->sum('amount'); ?>
                                        <?php    $legalcount = App\Legalheir::where('employee_id', $row1->id)->count('employee_id'); ?>

                                                <td width="2%" >{{$row->department_desc}}</td>
                                                <td width="5%" >{{$legalcount}}</td>
                                                <td width="8%">{{$legalsum}}</td>

                                            </tr>
                                        @endforeach
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

