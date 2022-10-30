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
    <div> <a href="#" class="btn btn-primary"> Download Report
        </a></div>

    @foreach($banks as $key => $bank)
        <table class="table table-bordered" style="font-size: 10pt">
              {{$key+1}}  : {{$bank->name}}
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Father Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Gitype</th>
                <th>User</th>
                <th>Legalheir Name</th>
                <th>Legalheir CNIC</th>
                <th>Branch</th>
                <th>Account #</th>
                <th>Amount</th>
            </tr>
            </thead>
{{--            @foreach($bk['legalheirs'] as $legalheir)--}}
{{--                {{$bank}}--}}

{{--            @endforeach--}}



{{--                {{$legalheir}}--}}
            <tbody>
            @foreach($bank->legalheirs as $legalheir)
                @if($legalheir->employee != NULL)
                    <tr>
                        <td>{{$legalheir->employee_id}}</td>
                        <td>{{$legalheir->employee->employeename}}</td>
                        <td>{{$legalheir->employee->fathername}}</td>
                        <td>{{$legalheir->employee->department->department_desc}}</td>
                        <td>{{$legalheir->employee->designation->designation_desc}}</td>
                        <td>{{$legalheir->employee->gitype}}</td>
                        <td>{{$legalheir->employee->user->name}}</td>
                        <td>{{$legalheir->heirname}}</td>
                        <td>{{$legalheir->heircnic}}</td>
                        <td>{{$legalheir->branch->branch_desc}}</td>
                        <td>{{$legalheir->accountno}}</td>
                        <td>{{$legalheir->amount}}</td>
                    </tr>
                @endif
            </tbody>
            @endforeach
        </table>
    @endforeach
</div>
</body>
</html>
