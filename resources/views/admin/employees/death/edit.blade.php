@extends('admin.layouts.include')

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('parsley/parsley.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php $user = Auth::user(); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Death Entry Form</h3>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form action="{{route('death.update',['id'=>$doc->employee_id])}}" method="post" accept-charset="UTF-8"
                                  enctype="multipart/form-data">
                                @csrf
                                {{--Row1--}}
                                @foreach($employees as $row)
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Personal Number</label>
                                                <input  type="text" value="{{$row->pno}}"
                                                        name="personalnumber" class="form-control pno"
                                                        placeholder="Enter Personal Number"
                                                        data-inputmask-inputformat="99999999" data-mask
                                                        data-parsley-minlength="08" data-parsley-required
                                                        data-parsley-type="digits" data-parsley-trigger="keyup" id="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Employee CNIC</label>
                                                <input type="text" id="empcnic" value="{{$row->employeecnic}}"
                                                       . name="employeecnic"
                                                       class="form-control cnic" placeholder="Enter CNIC"
                                                       data-inputmask-inputformat="99999-9999999-9" data-mask
                                                       data-parsley-required data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Employee Name</label>
                                                <input type="text" id="empname" name="employeename"
                                                       class="form-control name" value="{{$row->employeename}}"
                                                       . placeholder="Enter Employee Name"
                                                       data-parsley-required data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Father Name</label>
                                                <input type="text" . value="{{$row->fathername}}"
                                                       name="fathername" class="form-control "
                                                       placeholder="Father Name"
                                                       data-parsley-required data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                    </div>
                                    {{--Row2--}}
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input . type="text" name="dateofbirth"
                                                               value="{{$row->dateofbirth}}" id="dob"
                                                               class="form-control datemask"
                                                               data-inputmask-alias="datetime"
                                                               data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select class="form-control  select2" . name="department"
                                                        style="width: 100%;"
                                                        data-parsley-required>
                                                    <option selected="selected" .>Select Department</option>
                                                    @foreach( $departments as $department)
                                                        <option
                                                            value="{{$department->id}}"{{$department->id == $row->department_id ? "selected":""}}>{{{$department->department_desc}}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <select class="form-control  select2" . name="designation"
                                                        style="width: 100%;" required>
                                                    <option selected="selected" .>Select Designation</option>
                                                    @foreach( $designations as $designation)
                                                        <option
                                                            value="{{$designation->id}}" {{$designation->id == $row->designation_id ? "selected":""}}>{{{$designation->designation_desc}}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <select class="form-control select2" . id="grade" name="grade"
                                                        style="width: 100%;" required>
                                                    <option selected="selected" .>Select Grade</option>
                                                    @foreach( $grades as $grade)
                                                        <option
                                                            value="{{$grade->grade}}" {{$grade->grade == $row->grade ? "selected":""}}>{{{$grade->grade}}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Row 3 --}}
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Nature of Claim</label>
                                                <select class="form-control" . name="gitype" id="types"
                                                        style="width: 100%;"
                                                        required>
                                                    @if($row->gitype =='02')
                                                        <option value="03" selected="selected">Death</option>
                                                    @elseif($row->gitype =='03')
                                                        <option value="03" selected="selected">Death After Retirement</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Date of Death</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" . value="{{$row->dateofdeath}}" name="deathdate"
                                                           id="d_date" class="form-control datemask"
                                                           data-inputmask-alias="datetime"
                                                           data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <div class="col-sm-2" id="check">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">

                                                    </div>
                                                    <input type="button" style="margin-top: 10px;" id="submit"
                                                           value="Calculate Amount"
                                                           class="form-control  btn btn-primary">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Age on Date</label>
                                                <input type="number" . value="{{$row->ageondate}}"
                                                       id="ageondate" name="ageondate" class="form-control"
                                                       placeholder="Calculating......" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input type="text" . value="{{$row->contactno}}"
                                                       name="contact_no" class="form-control "
                                                       placeholder="0331XXXXXXX" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Beneficiaries</label>
                                                <input type="number" . value="{{$row->beneficiaries}}"
                                                       id="beneficiaries" value="1" min="1" max="5" name="beneficiaries"
                                                       class="form-control "
                                                       placeholder="Beneficiaries" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" style="display: none">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label> </label>
                                                <input type="button" style="margin-top: 10px;" id="append" value="Append"
                                                       class="form-control  btn btn-primary">
                                            </div>
                                        </div>

                                    </div>
                                    @foreach($row->legals as $key => $row1)
                                        <div class="row">

                                            <h5><u>Beneficiary Details</u><b>[{{$key+1}}]</b></h5>
                                            <hr>
                                        </div>

                                        <div id="addmore">
                                            {{--<!--                                    --><?php //$relationn = json_decode($employees->relation);--}}
                                            {{--//                                     $beneficiaryname = json_decode($employees->beneficiaryname);--}}
                                            {{--//                                    $bankk = json_decode($employees->bank);--}}
                                            {{--//                                    $branchh =json_decode($employees->branch);--}}
                                            {{--//                                    $accountno =json_decode($employees->accountno);--}}
                                            {{--//                                    $amount =json_decode($employees->amount);--}}
                                            {{--//                                    ?>--}}
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Beneficiary CNIC</label>
                                                        <input . type="text" id="benefcnic" value="{{$row1->heircnic}}"
                                                               name="beneficiarycnic[]" class="form-control cnic"
                                                               placeholder="Beneficiary CNIC" required
                                                               data-inputmask-inputformat="99999-9999999-9" data-mask>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Beneficiary Name</label>
                                                        <input type="text" . value="{{$row1->heirname}}" id="benefname" name="beneficiaryname[]"
                                                               class="form-control" placeholder="Beneficiary Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Relation</label>
                                                        <select class="form-control select2" . id="rel" name="relation[]"
                                                                style="width: 100%;" required>
                                                            <option selected="selected">Select Relation</option>
                                                            @foreach($relations as $relation)
                                                                <option
                                                                    value="{{$relation->id}}" {{$relation->id == $row1->relation_id  ? "selected":""}}>{{$relation->relation_desc}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <select class="form-control select2" .  name="bank[]" id="bank"
                                                                style="width: 100%;" required>
                                                            <option selected="selected" .>Select Bank</option>
                                                            @foreach($banks as $bank)
                                                                <option value="{{$bank->id}}" {{$bank->id == $row1->bank_id ? "selected":""}}>{{$bank->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Branch</label>
                                                        <select  . class="form-control select2 bankbranches"
                                                                 name="branch[]"
                                                                 style="width: 100%;" required>
                                                            @foreach($branch as $row)
                                                                <option value="{{$row->id}}" {{$row->id == $row1->branch_id  ? "selected":""}}>{{$row->branch_desc}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="text"  . value="{{$row1->accountno}}" name="accountno[]" class="form-control iban"
                                                               placeholder="IBAN Number" data-parsley-type="alphanum"
                                                               data-parsley-trigger="keyup" data-parsley-maxlength="24"
                                                               data-parsley-minlength="24" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3" id="amount1">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input type="text" . value="{{$row1->amount}}" id="amount" name="amount[]"
                                                               class="form-control" placeholder="calculating...."
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endforeach

                                {{--Attacments Section--}}
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Attachments</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Employee CNIC</label>
                                                    <input class="form-control" name="employee_cnic_img" type="file">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Beneficiary CNIC</label>
                                                    <input class="form-control" name="beneficiary_cnic[]" type="file"
                                                           multiple>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Death Certificate</label>
                                                    <input class="form-control" name="death_certificate" type="file">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Succession
                                                        Certificate</label>
                                                    <input class="form-control" name="succession_certificate"
                                                           type="file">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Death Claim Form</label>
                                                    <input class="form-control" name="death_form" type="file">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Pension Sheet of
                                                        Beneficiary</label>
                                                    <input class="form-control" name="beneficiary_pension_sheet[]"
                                                           type="file" multiple>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Last Pay
                                                        Certificate</label>
                                                    <input class="form-control" name="last_pay_certificate" type="file">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Bank Option Farm</label>
                                                    <input class="form-control" name="bank_farm" type="file">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- in case of 2 beneficiaries shown other wise hidden -->
                                        {{--                                        <div class="row">--}}

                                        {{--                                            <div class="col-sm-3">--}}
                                        {{--                                                <div class="mb-3">--}}
                                        {{--                                                    <label for="formFile" class="form-label">2nd Beneficiary CNIC</label>--}}
                                        {{--                                                    <input class="form-control" name="beneficiary_cnic2_img" type="file" >--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}

                                        {{--                                            <div class="col-sm-3">--}}
                                        {{--                                                <div class="mb-3">--}}
                                        {{--                                                    <label for="formFile" class="form-label">Pension Sheet 2nd Beneficiary</label>--}}
                                        {{--                                                    <input class="form-control" name="beneficiary_pension_sheet2" type="file">--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}

                                        {{--                                        </div>--}}
                                        <!-- in case of 2 beneficiaries shown other wise hidden -->

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <!-- /.card-body -->
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Details Objection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('objection')}}" method="post" enctype="multipart/form-data"
                              data-parsley-validate>
                            @csrf
                            <input type="hidden" name="id" value="{{$doc->employee_id}}">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title"><b>Description</b><span class="text-danger">*</span></label>
                                    <textarea placeholder="Description" class="form-control" name="description"></textarea>

                                </div>
                            </div>

                            <div class="col-md-12 pull-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div></div>

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{asset('parsley/parsley.min.js')}}"></script>
    <script>
        $('#entryform').parsley();
    </script>
    <script>
        $("#submit").click(function () {
            var dor = $("#d_date").val();
            var dob = $("#dob").val();
            const per = $("#beneficiaries").val();

            console.log(dor);

            function isValidDate(s) {
                var bits = s.split('/');
                var d = new Date(bits[2], bits[1] - 1, bits[0]);
                return d && (d.getMonth() + 1) == bits[1];
            }


            console.log(isValidDate(dob))
            if (isValidDate(dor)) {
                //age calculate
                const date1 = new Date(dob);
                const date2 = new Date(dor);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                const year = Math.ceil(diffDays / 365);
                console.log(diffDays, year);
                $("#ageondate").val(year);
                //end age calculate
                var grade = $("#grade").val();
                if (grade == null) {
                    alert('Please Select Grade')
                    $("#d_date").val(null);
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('fetchrate')}}',
                        data: {
                            _token: "{{ csrf_token() }}",
                            dor: dor,
                            grade: grade,
                        },
                        success: function (response) {
                            console.log(response.success);
                            if (response.success != null) {
                                $("#amount").val(response.success.death);
                                $("#amount1").show();
                            } else {
                                $("#amount").val(null);
                                $("#d_date").val(null);
                                alert('Please Select Valid Date')
                            }
                        }
                    });
                }
            }

        });
    </script>
    <script>
        (function () {
            var previous, privious2;
            $("#beneficiaries").on('focus', function () {
                previous = $("#beneficiaries").val();
            });
            $("#amount").on('focus', function () {
                privious2 = $("#amount").val();
            });
            $('#append').on('click', function () {
                var beneficiaries = $("#beneficiaries").val();
                console.log("Privious" + previous);
                console.log("New" + beneficiaries);
                if (previous != 1) {
                    var c = $('#addmore .row').length;
                    for ($k = 1; $k <= c - 1; $k++) {
                        $('#okay').remove();
                    }
                }
                previous = $("#beneficiaries").val();
                const per = $("#beneficiaries").val();
                const amount = $("#amount").val();
                $("#amount").val(amount / per);

                for ($i = 1; $i <= beneficiaries - 1; $i++) {
                    const key = $i + 1;
                    $('#addmore').append('<div class="row" id="okay">' +
                        '<div class="col-sm-12">' +
                        ' <h5><u>Beneficiary Details [' + key + '] </u></h5> ' +
                        '<hr>' +
                        '</div>' +
                        '<div class="col-sm-4">' +
                        '<div class="form-group">' +
                        ' <label>Beneficiary CNIC</label>' +
                        '<input type="text" id="benefcnic" name="beneficiarycnic[]" class="form-control cnic" placeholder="Beneficiary CNIC" required data-inputmask-inputformat="99999-9999999-9" data-mask>' +
                        '</div>' +
                        ' </div>' +
                        ' <div class="col-sm-4">' +
                        '<div class="form-group">' +
                        ' <label>Beneficiary Name</label>' +
                        ' <input type="text" id="benefname" name="beneficiaryname[]" class="form-control" placeholder="Beneficiary Name" required>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-sm-4">' +
                        '<div class="form-group">' +
                        ' <label>Relation</label>' +
                        ' <select class="form-control select2" id="rel" name="relation[]" style="width: 100%;" required>' +
                        '<option selected="selected">Select Relation</option>' +
                        '@foreach($relations as $relation)' +
                        ' <option value = "{{$relation->id}}">{{$relation->relation_desc}}</option>' +
                        ' @endforeach' +
                        ' </select>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-3">' +
                        '<div class="form-group">' +
                        '  <label>Bank Name</label>' +
                        ' <select class="form-control select2" name="bank[]" id="bank" style="width: 100%;" required>' +
                        '<option selected="selected" .>Select Bank</option>' +
                        ' @foreach($banks as $bank)' +
                        ' <option value="{{$bank->id}}">{{$bank->name}}</option>' +
                        '@endforeach' +
                        ' </select>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-sm-3">' +
                        '<div class="form-group">' +
                        '<label>Branch</label>' +
                        '<select class="form-control select2 bankbranches" name="branch[]" style="width: 100%;" required>' +

                        '</select>' +
                        '</div>' +
                        ' </div>' +
                        '<div class="col-sm-3">' +
                        <!-- text input -->
                        '<div class="form-group">' +
                        '<label>Account Number</label>' +
                        '<input type="text" name="accountno[]" class="form-control iban" placeholder="IBAN Number" data-parsley-type="alphanum" data-parsley-trigger="keyup" data-parsley-maxlength="24" data-parsley-minlength="24" required>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-3" id="amount1" >' +
                        <!-- text input -->
                        ' <div class="form-group">' +
                        '<label>Amount</label>' +
                        "<input type='text' id='amount' value='" + amount / per + "' name='amount[]' class='form-control' placeholder='calculating....' required>" +
                        '</div>' +
                        ' </div>');
                }

            });
        })();

        function removecolor(elem) {
            if ($('#addmore .row').length > 1) {
                $(elem).parent('div').parent('div').remove();
            }
        }
    </script>
@endsection
