<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    @foreach($departments as $key => $row)
    <table class="table table-bordered" style="font-size: 11pt">
       {{$key+1}}  : {{$row->department_desc}}
        <thead>
        <tr>
            <th>Id</th>
            <th>Employee Name</th>
            <th>Father Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Gitype</th>
            <th>User</th>
            <th>Legalheir Name</th>
            <th>Legalheir CNIC</th>
            <th>Bank</th>
            <th>Branch</th>
            <th>Account #</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        {{--        @foreach($employees as $row)--}}

        {{--            <tr>--}}
        {{--                --}}{{--        {{dd($row->legals)}}--}}
        {{--                <td>{{$row->legals}}</td>--}}
        {{--                <td>{{$row->employeename}}</td>--}}
        {{--                <td>{{$row->fathername}}</td>--}}
        {{--                <td>{{$row->department->department_desc}}</td>--}}
        {{--                <td>{{$row->designation->designation_desc}}</td>--}}
        {{--                <td>{{$row->gitype}}</td>--}}
        {{--                <td>{{$row->user->name}}</td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->heirname}} <br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->heircnic}} <br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->bank->name}}<br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->branch->branch_desc}}<br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->accountno}}<br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--                <td>--}}
        {{--                    @foreach($row->legals as $key=> $row1)--}}
        {{--                        {{$key+1}} : {{$row1->amount}} <br>--}}
        {{--                    @endforeach--}}
        {{--                </td>--}}
        {{--            </tr>--}}

            @foreach($row->employees as  $row1)

                <tr>
                    {{--        {{dd($row->legals)}}--}}
                    <td>{{$row1->id}}</td>
                    <td>{{$row1->employeename}}</td>
                    <td>{{$row1->fathername}}</td>
                    <td>{{$row1->department->department_desc}}</td>
                    <td>{{$row1->designation->designation_desc}}</td>
                    <td>{{$row1->gitype}}</td>
                    <td>{{$row1->user->name}}</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>
                    <td>---</td>


                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
