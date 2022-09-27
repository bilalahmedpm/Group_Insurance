@extends('admin.layouts.include')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php $user = Auth::user(); ?>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Entry Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Personal Number</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Personal Number" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Employee CNIC</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter CNIC" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" class="form-control form-control-sm " placeholder="Enter Employee Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Father Name</label>
                                                <input type="text" class="form-control form-control-sm " placeholder="Father Name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" class="form-control form-control-sm " placeholder="Date of Birth" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Deparment</label>
                                                <select class="form-control form-control-sm select2" style="width: 100%;">
                                                    <option selected="selected">Select Department</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control form-control-sm select2" style="width: 100%;">
                                                    <option selected="selected">Select Designation</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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



{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <table class="table table-bordered" style="font-size: 11pt">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Id</th>--}}
{{--            <th>Employee Name</th>--}}
{{--            <th>Father Name</th>--}}
{{--            <th>Department</th>--}}
{{--            <th>Designation</th>--}}
{{--            <th>Gitype</th>--}}
{{--            <th>User</th>--}}
{{--            <th>Legalheir Name</th>--}}
{{--            <th>Legalheir CNIC</th>--}}
{{--            <th>Bank</th>--}}
{{--            <th>Branch</th>--}}
{{--            <th>Account #</th>--}}
{{--            <th>Amount</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        --}}{{--        @foreach($employees as $row)--}}

{{--        --}}{{--            <tr>--}}
{{--        --}}{{--                --}}{{----}}{{--        {{dd($row->legals)}}--}}
{{--        --}}{{--                <td>{{$row->legals}}</td>--}}
{{--        --}}{{--                <td>{{$row->employeename}}</td>--}}
{{--        --}}{{--                <td>{{$row->fathername}}</td>--}}
{{--        --}}{{--                <td>{{$row->department->department_desc}}</td>--}}
{{--        --}}{{--                <td>{{$row->designation->designation_desc}}</td>--}}
{{--        --}}{{--                <td>{{$row->gitype}}</td>--}}
{{--        --}}{{--                <td>{{$row->user->name}}</td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->heirname}} <br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->heircnic}} <br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->bank->name}}<br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->branch->branch_desc}}<br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->accountno}}<br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--                <td>--}}
{{--        --}}{{--                    @foreach($row->legals as $key=> $row1)--}}
{{--        --}}{{--                        {{$key+1}} : {{$row1->amount}} <br>--}}
{{--        --}}{{--                    @endforeach--}}
{{--        --}}{{--                </td>--}}
{{--        --}}{{--            </tr>--}}
{{--        @if($employees)--}}
{{--        @foreach($employees as $row)--}}
{{--            @foreach($row->legals as  $row1)--}}
{{--                <tr>--}}
{{--                    --}}{{--        {{dd($row->legals)}}--}}
{{--                    <td>{{$row1->employee_id}}</td>--}}
{{--                    <td>{{$row->employeename}}</td>--}}
{{--                    <td>{{$row->fathername}}</td>--}}
{{--                    <td>{{$row->department->department_desc}}</td>--}}
{{--                    <td>{{$row->designation->designation_desc}}</td>--}}
{{--                    <td>{{$row->gitype}}</td>--}}
{{--                    <td>{{$row->user->name}}</td>--}}
{{--                    <td> {{$row1->heirname}} </td>--}}
{{--                    <td> {{$row1->heircnic}} </td>--}}
{{--                    <td> {{$row1->bank->name}} </td>--}}
{{--                    <td>{{$row1->branch->branch_desc}} </td>--}}
{{--                    <td> {{$row1->accountno}}</td>--}}
{{--                    <td>{{$row1->amount}}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
{{--            @endif--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
