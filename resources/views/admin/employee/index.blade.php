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
                                <a href="{{route('employee.create')}}" style="margin-left: 30px;"  class="btn btn-primary btn-sm float-right">Add New Employee </a>
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
                                        <th>Gitype</th>
                                        <th>Beneficiary<br>Name</th>
                                        <th>Bank</th>
                                        <th>Branch</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
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
                                            <td>{{$row->designation->designation_desc}} - ({{$row->grade}})</td>
                                            <td>{{$row->gitype}}</td>
                                            <td>{{$row1->heirname}}</td>
                                            <td>{{$row1->bank->name}}</td>
                                            <td>{{$row1->branch->branch_desc}}</td>
                                            <td>{{$row1->amount}}</td>
                                            <td>
                                                <a href="{{route('employee.edit' ,$row->id)}}" data-toggle="modal"
                                                   data-target="#useredit{{$row->id}}" class="btn btn-sm btn-primary"
                                                   title="edit">
                                                    <i class="fa fa-pen"></i> Edit
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
