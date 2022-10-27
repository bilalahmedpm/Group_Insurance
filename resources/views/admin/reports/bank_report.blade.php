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
    @foreach($banks as $key => $row)
        <table class="table table-bordered" style="font-size: 10pt">

            {{$key+1}}  : {{$row->name}}
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
            @foreach($row->legalheirs as  $row1)

                    <tr>
                        <td>{{$row1->employee_id}}</td>
                        <td>{{$row1->employee->employeename}}</td>
                        <td>{{$row1->employee->fathername}}</td>
                        <td>{{$row1->employee->department->department_desc}}</td>
                        <td>{{$row1->employee->designation->designation_desc}}</td>
                        <td>{{$row1->employee->gitype}}</td>
                        <td>{{$row1->employee->user->name}}</td>
                        <td>{{$row1->heirname}}</td>
                        <td>{{$row1->heircnic}}</td>
                        <td>{{$row1->bank->name}}</td>
                        <td>{{$row1->branch->branch_desc}}</td>
                        <td>{{$row1->accountno}}</td>
                        <td>{{number_format($row1->amount)}}</td>
                    </tr>


                @endforeach
            @endforeach
            </tbody>
        </table>
</div>
</body>
</html>
