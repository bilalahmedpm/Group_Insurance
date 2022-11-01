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
            text-align: left;
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
                    <?php $grandTotal=0; ?>
                    <div class="card">
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-3  col-lg-off-9">--}}
{{--                                <button class="btn btn-info" onclick="Convert_HTML_To_PDF();">DOWNLOD PDF REPORT</button>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3  col-lg-off-9">--}}
{{--                                <button class="btn btn-info" onclick=" printPageArea('contentToConvert_pdf');">Print REPORT</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    @foreach($departments as $key => $row)
                            <?php $totalamount = 0;  ?>
                                <div class="card-header">
                                    <h6 style="text-transform: uppercase; font-weight: bold;font-size: medium" class="card-title"> <u>{{$key+1}} :{{$row->department_desc}}</u></h6>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm table-bordered" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="2%">ID</th>
                                            <th width="5%">Personal #</th>
                                            <th width="8%">Employee Name</th>
                                            <th width="8%">Father Name</th>
                                            <th width="4%">Employee Cnic</th>
                                            <th width="5%">Department</th>
                                            <th width="7%">Designation</th>
                                            <th width="7%">Grade</th>
                                            <th width="3%">Gitype</th>
                                            <th width="7%">DOR</th>
                                            <th width="7%">DOD</th>
                                            <th width="5%">Amount</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($row->employees as  $row1)


                                                @foreach ($row1->legals as $row2)

                                                    <tr>
                                                        <td width="2%" >{{$row2->employee_id}}</td>
                                                        <td width="5%" >{{$row1->pno}}</td>
                                                        <td width="8%">{{$row1->employeename}}</td>
                                                        <td width="8%" >{{$row1->fathername}}</td>
                                                        <td width="4%">{{$row1->employeecnic}}</td>
                                                        <td width="5%">{{$row1->department->department_desc}}</td>
                                                        <td width="7%">{{$row1->designation->designation_desc}}</td>
                                                        <td width="7%">(BPS-{{$row1->grade}})</td>
                                                        <td width="3%">
                                                            @if($row1->gitype == '01')
                                                                Retirement
                                                            @elseif($row1->gitype == '02')
                                                                Death
                                                            @elseif($row1->gitype == '03')
                                                                Death After Retirement
                                                            @endif
                                                            </td>
                                                        <td width="7%">{{$row1->retirementdate}}</td>
                                                        <td width="7%">{{$row1->dateofdeath}}</td>
                                                        <td width="5%">{{{number_format($row2->amount)}}}</td>
                                                    </tr>

                                                    <?php $totalamount += $row2->amount++ ?>
                                                @endforeach
                                        @endforeach
                                        <tr>
                                            <td style="text-align: right;font-weight: bold" colspan="11">Sub-Total Amount :  </td>
                                            <td width="5%" colspan="10"  class="font-weight-bolder" style="text-decoration-line: underline; text-decoration-style: double;" > <h6>{{number_format($totalamount)}}</h6></td>
                                        </tr>
                               </tbody>

                                    </table>
                                </div> <!-- /.card-body -->
                                <!-- /.card -->

                                <div style="float: right; margin-right: 50px;">
                                    <?php $grandTotal +=$totalamount ?>
                                </div>
                                <table>
                            <tr>
                                <td  width="5%" colspan="12"><span style="font-weight: bold">Total Amount :</span>&nbsp;&nbsp;<h6 style="text-decoration-line: underline; text-decoration-style: double; float: right"> Rs:    {{number_format($grandTotal)}}</h6></td>
                            </tr>
                        </table>

                        @endforeach
                </div>
            </div>

            </div><!-- /.col -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('otherscript')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

<script>
    window.html2canvas = html2canvas;
    window.jsPDF = window.jspdf.jsPDF;
//    window.html2canvas = html2canvas;

    function Convert_HTML_To_PDF()
    {
        var doc = new jsPDF();
        var elementHTML = document.querySelector("#contentToConvert_pdf");
        doc.html(elementHTML, {
            callback: function(doc) {
                orientation: 'landscape',
                // Save the PDF
                doc.save('departmentRepoer.pdf');
            },
            orientation: "landscape",
            unit: "px",
            format: [563, 975],
            margin: [10, 10, 10, 10],
            autoPaging: 'text',
            x: 0,
            y: 0,
            width: 563, //target width in the PDF document
            windowWidth: 975 //window width in CSS pixels
    });
}
function printPageArea(contentToConvert_pdf){
    var printContent = document.getElementById(contentToConvert_pdf);
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}





    function convertToPdf(){
        const doc = new jsPDF({
            orientation: "landscape",
            unit: "in",
            format: [563 , 975]
        });
    }
</script>

@endpush
