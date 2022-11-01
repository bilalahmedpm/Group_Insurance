<html>
<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 150px 20px;
        }
        header {
            position: fixed;
            top: -80px;
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
            bottom: -80px;
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
        table,th,td{
            border: solid 1px black;
        }
        table{
            width: 100%;
            text-align: center;
            text-transform: uppercase;
            border-collapse: collapse;
        }
        th{
            /*padding: 5px;*/
            font-size: 10pt;
        }
        td
        {
            /*padding: 5px;*/
            font-size: 11pt;
        }
        .id{
            width: 50px;
        }
    </style>



</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>

    Department-Wise List

</header>


<footer>
    Copyright © <?php echo date("Y");?>

</footer>


<!-- Wrap the content of your PDF inside a main tag -->

<main>
    @foreach($departments as $key => $row)
        <?php $totalamount = 0;  ?>
    <h3>{{$key+1}} :{{$row->department_desc}}</h3>

            <table style="page-break-after:always;">
                <thead>
                <tr>
                    <th class="id">ID</th>
                    <th>Employee <br> Personal # <br> Name & CNIC #</th>
                    <th>Father / Husband <br> Name</th>
                    <th>Designation / Grade</th>
                    <th>Gitype</th>
                    <th>Beneficiary Name <br>Cnic # <br> Relation</th>
                    <th> Bank <br> Branch Code  <br> Branch Address</th>
                    <th>Account No</th>
                    <th>Amount</th>

                </tr>
                </thead>
                        <tbody>
                        @foreach($row->employees as  $row1)
                            @foreach ($row1->legals as $row2)
                        <tr>
                            <td class="id">{{$row2->employee_id}}</td>
                            <td>{{$row1->pno}}<br>{{$row1->employeename}}<br>{{$row1->employeecnic}}</td>
                            <td>{{$row1->fathername}}</td>
                            <td>{{$row1->designation->designation_desc}} <br>(BPS-{{$row1->grade}})</td>
                            <td>
                                @if($row1->gitype == 1)
                                Retirement
                                @elseif($row1->gitype == 2)
                                Death
                                @elseif($row1->gitype == 3)
                                Death After Retirement
                                @endif
                            </td>
                            <td>{{$row2->heirname}} <br> {{$row2->heircnic}} <br> {{$row2->relation->relation_desc}}</td>
                            <td>{{$row2->bank->name}} <br>({{$row2->branch->branch_code}})<br>{{$row2->branch->branch_desc}}</td>
                            <td>{{$row2->accountno}}</td>
                            <td>{{number_format($row2->amount)}}</td>
                            <?php $totalamount += $row2->amount ?>
                       @endforeach
                @endforeach
                        </tr>
                        <tr>
                            <td  style="text-align: right;font-weight: bold;padding-right: 20px" colspan="8">Total Amount :  </td>
                            <td  colspan="9" style="text-decoration-line: underline; font-size: 11pt;padding: 5px; text-align: center; font-weight: bold" > {{number_format($totalamount)}}/-</td>
                        </tr>
                    </tbody>
                 </table>
             @endforeach

        </main>

    </body>

</html>
