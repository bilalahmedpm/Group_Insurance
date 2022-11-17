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
            text-align: center;
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
                        <div class="card">
                            <div style="text-align: right; padding: 10px;">
                                <a href="" style="float: right; margin-right: 50px; margin-top: 10px;" class="btn btn-primary">Download PDF</a>

                                <h5 style="text-decoration: underline; text-align: center">Group Insurance <br> Year Wise Summary</h5>
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
                                    <th width="2%">Year</th>
                                    <th width="5%">Retirement Cases</th>
                                    <th width="5%">Retirement Amount</th>
                                    <th width="5%">Death Cases</th>
                                    <th width="5%">Death Amount</th>
                                    <th width="8%">Death After Retirement</th>
                                    <th width="8%">Death after Retirment Amount</th>
                                    <th width="8%">Total Cases</th>
                                    <th width="8%">Total Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $retire=0;
                                $r_amount =0;
                                $death = 0;
                                $d_amount = 0;
                                $death_after = 0;
                                $da_amount = 0;
                                $t_cases = 0;
                                $gt_amount = 0;

                                ?>
                                @foreach($year_summary as $row)
                                    <tr>
                                        <td width="2%"style="font-weight: bold;">{{$row->years}}</td>
                                        <td>{{$row->retirement}}</td>
                                        <td >{{$row->retirementAmount}}</td>
                                        <td >{{$row->Death}}</td>
                                        <td >{{$row->DeathAmount}}</td>
                                        <td >{{$row->Deathafterretirement}}</td>
                                        <td >{{$row->DeathAfterRetirementAmount}}</td>
                                        <td >{{$row->totalcases}}</td>
                                        <td>{{$row->totalamount}}</td>
                                        <?php
                                        $retire += $row->retirement;
                                        $r_amount += $row->retirementAmount;
                                        $death += $row->Death;
                                        $d_amount += $row->DeathAmount;
                                        $death_after += $row->Deathafterretirement;
                                        $da_amount += $row->DeathAfterRetirementAmount;
                                        $t_cases += $row->totalcases;
                                        $gt_amount += $row->totalamount;
                                        ?>
{{--                                        <td width="5%">{{$row->numberofcases}}</td>--}}
{{--                                        <td width="8%">{{number_format($row->totalamount)}}</td>--}}
{{--                                        <?php $totalamount += $row->totalamount ?>--}}
{{--                                        <?php $numberofcases += $row->numberofcases ?>--}}
                                    </tr>
                                @endforeach
                                <tr style="font-weight: bold; text-align: center;">
                                    <td> Grand Total </td>
                                    <td>{{$retire}}</td>
                                    <td>{{number_format($r_amount)}}</td>
                                    <td>{{$death}}</td>
                                    <td>{{number_format($d_amount)}}</td>
                                    <td>{{$death_after}}</td>
                                    <td>{{number_format($da_amount)}}</td>
                                    <td>{{number_format($t_cases)}}</td>
                                    <td>{{number_format($gt_amount)}}</td>
                                </tr>
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

