<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Department </th>
        <th>Count</th>
    </tr>
    </thead>

    <tbody>
    @foreach($count as $key => $row)

            <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->department_desc}}</td>
                <td>{{$row->employees_count}}</td>
            </tr>

    @endforeach
    </tbody>

</table>
</body>
</html>
