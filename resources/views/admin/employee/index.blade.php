<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<table class="table table-sm">
    <thead>
    <tr>
        <th>Employee Id</th>
        <th>Employee Name</th>
        <th>Father Name</th>
        <th>Gitype</th>
        <th>Legalheir Name</th>
        <th>Legalheir CNIC</th>
        <th>Bank</th>
        <th>Branch</th>
        <th>Account #</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($legalheirs as $row)
    <tr>

        <td>{{$row->employee_id}}</td>
        <td>{{$row->employee->employeename}}</td>
        <td>{{$row->employee->fathername}}</td>
        <td>{{$row->employee->gitype}}</td>
        <td>{{$row->heirname}}</td>
        <td>{{$row->heircnic}}</td>
        <td>{{$row->bank_id}}</td>
        <td>{{$row->branch_id}}</td>
        <td>{{$row->accountno}}</td>
        <td>{{$row->amount}}</td>

    </tr>
    @endforeach
    </tbody>
</table>
</div>
</body>
</html>
