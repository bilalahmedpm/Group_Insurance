<html>
<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 20px !important;

            /** Extra personal styles **/
            background-color: #008B8B;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 20px !important;

            /** Extra personal styles **/
            background-color: #008B8B;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        table{
            width: 100%;

        }
        table,th{
            padding: 10px;
        }
    </style>



</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>

    Nicesnippets.com

</header>


<footer>
    Copyright © <?php echo date("Y");?>
</footer>


<!-- Wrap the content of your PDF inside a main tag -->

<main>
    <h3 style="text-decoration:underline">Secondary Education</h3>
<table border="1">

    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Employee CNIC</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Date Of retirment</th>
        <th>Date of Death</th>
        <th>Gitype</th>
        <th>Amount</th>

    </thead>
    <tbody>
    @foreach($users as $users)
    <tr>
        <td><p>{{$users->id}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>
                @if($users->role==1)
                Super Admin
                    @elseif($users->role==3)
                        User
                    @endif
            </p>
        </td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
        <td><p>{{$users->name}}</p></td>
    </tr>
    @endforeach
    </tbody>
</table>
    <p style="page-break-after: always;">

        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

    </p>

    <p style="page-break-after: never;">

        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

    </p>

</main>

</body>

</html>
