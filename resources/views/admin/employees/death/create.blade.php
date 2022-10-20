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
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Death Entry Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="entryform" action="{{route('death.store')}}" method="post" accept-charset="UTF-8"
                                  enctype="multipart/form-data" data-parsley-ui-enabled="true" data-parsley-focus="first">
                                @csrf
                                {{--Row1--}}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Personal Number</label>
                                            <input type="text" id="pnumber" name="personalnumber" class="form-control pno"
                                                   placeholder="12345678"
                                                   data-inputmask-inputformat="99999999" data-mask
                                                   data-parsley-minlength="08" data-parsley-maxlength="08"
                                                   data-parsley-type="digits" data-parsley-trigger="keyup" required >
                                            <div id="personal"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee CNIC</label>
                                            <input type="text" id="empcnic" name="employeecnic"
                                                   class="form-control cnic" placeholder="Enter CNIC"
                                                   data-inputmask-inputformat="9999999999999" data-mask data-parsley-minlength="13" data-parsley-maxlength="13"
                                                   data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" id="empname" name="employeename"
                                                   class="form-control name" placeholder="Enter Employee Name"
                                                   data-parsley-required data-parsley-trigger="keyup" required style ="text-transform: capitalize" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" name="fathername" class="form-control "
                                                   placeholder="Father Name"
                                                   data-parsley-required data-parsley-trigger="keyup" required style ="text-transform: capitalize">
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
                                                    <input type="text" name="dateofbirth" id="dob"
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
                                            <select class="form-control  select2" name="department" style="width: 100%;"
                                                    data-parsley-required>
                                                <option selected="selected" disabled>Select Department</option>
                                                @foreach( $departments as $department)
                                                    <option
                                                        value="{{$department->id}}">{{{$department->department_desc}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select class="form-control  select2" name="designation"
                                                    style="width: 100%;" required>
                                                <option selected="selected" disabled>Select Designation</option>
                                                @foreach( $designations as $designation)
                                                    <option
                                                        value="{{$designation->id}}">{{{$designation->designation_desc}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <select class="form-control select2" id="grade" name="grade"
                                                    style="width: 100%;" required>
                                                <option selected="selected" disabled>Select Grade</option>
                                                @foreach( $grades as $grade)
                                                    <option value="{{$grade->grade}}">{{{$grade->grade}}}</option>
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
                                            <select class="form-control" name="gitype" id="types" style="width: 100%;"
                                                    required>
                                                <option selected="selected" disabled> Select Gitype</option>
                                                <option value="02">Death</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date of Death</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="deathdate" id="d_date" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Age on Date</label>
                                            <input type="number" id="ageondate" name="ageondate" class="form-control"
                                                   placeholder="Calculating......" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contact NO</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="contact_no" placeholder="03#########"
                                                       minlength="11" maxlength="11"  data-parsley-trigger="keyup" required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                </div> <!-- End of Row-->

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Beneficiaries</label>
                                            <input type="number" id="beneficiaries" value="1" min="1" max="5"
                                                   name="beneficiaries" class="form-control "
                                                   placeholder="Beneficiaries" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-1" id="check">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">

                                                </div>
                                                <input type="button" style="margin-top: 10px;" id="submit" value="Add Amount"
                                                       class="form-control  btn btn-primary">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> </label>
                                            <input type="button" style="margin-top: 10px;" id="append" value="Add Beneficiaries"
                                                   class="form-control  btn btn-primary">
                                        </div>
                                    </div>

                                </div><!-- End of Row-->

                                <div class="row">
                                    <h5><u>Beneficiary Details</u><b>[1]</b></h5>
                                    <hr>
                                </div>
                                <div id="addmore">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Beneficiary CNIC</label>
                                                <input type="text" id="benefcnic" name="beneficiarycnic[]"
                                                       class="form-control cnic" placeholder="Beneficiary CNIC" required
                                                       data-inputmask-inputformat="9999999999999" data-mask data-parsley-minlength="13" data-parsley-maxlength="13"
                                                       data-parsley-trigger="keyup">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Beneficiary Name</label>
                                                <input type="text" id="benefname" name="beneficiaryname[]"
                                                       class="form-control" placeholder="Beneficiary Name" required style ="text-transform: capitalize">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Relation</label>
                                                <select class="form-control select2" id="rel" name="relation[]"
                                                        style="width: 100%;" required>
                                                    <option selected="selected">Select Relation</option>
                                                    @foreach($relations as $relation)
                                                        <option
                                                            value="{{$relation->id}}">{{$relation->relation_desc}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <select class="form-control select2" name="bank[]" id="bank"
                                                        style="width: 100%;" required>
                                                    <option selected="selected" disabled>Select Bank</option>
                                                    @foreach($banks as $bank)
                                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Branch</label>
                                                <select class="form-control select2 bankbranches" name="branch[]"
                                                        style="width: 100%;" required>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" name="accountno[]" class="form-control iban"
                                                       placeholder="IBAN Number" data-parsley-type="alphanum"
                                                       data-parsley-trigger="keyup" data-parsley-maxlength="24"
                                                       data-parsley-minlength="24" required style ="text-transform:uppercase">
                                            </div>
                                        </div>
                                        <div class="col-sm-3" id="amount1">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" id="amount" name="amount[]" class="form-control"
                                                       placeholder="calculating...." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                    <input class="form-control" name="employee_cnic_img" type="file"  required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Beneficiary CNIC</label>
                                                    <input class="form-control" name="beneficiary_cnic[]" type="file" required
                                                           multiple>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Death Certificate</label>
                                                    <input class="form-control" name="death_certificate" type="file" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Succession
                                                        Certificate</label>
                                                    <input class="form-control" name="succession_certificate"
                                                           type="file" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Death Claim Form</label>
                                                    <input class="form-control" name="death_form" type="file" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Pension Sheet of
                                                        Beneficiary</label>
                                                    <input class="form-control" name="beneficiary_pension_sheet[]"
                                                           type="file" multiple required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Last Pay
                                                        Certificate</label>
                                                    <input class="form-control" name="last_pay_certificate" type="file" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Bank Option Farm</label>
                                                    <input class="form-control" name="bank_farm" type="file" required>
                                                </div>
                                            </div>

                                        </div>

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
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script src="{{asset('parsley/parsley.min.js')}}"></script>
    <script>
        $('.entryform').parsley({
        });

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
                $("#append2").hide();


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
                        '<input type="text" id="benefcnic" name="beneficiarycnic[]" class="form-control cnic" placeholder="Beneficiary CNIC" required data-parsley-maxlength="13" data-parsley-minlength="13" data-parsley-trigger="keyup" data-inputmask-inputformat="9999999999999" data-mask >' +
                        '</div>' +
                        ' </div>' +
                        ' <div class="col-sm-4">' +
                        '<div class="form-group">' +
                        ' <label>Beneficiary Name</label>' +
                        ' <input type="text" id="benefname" name="beneficiaryname[]" class="form-control" placeholder="Beneficiary Name" required style ="text-transform: capitalize">' +
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
                        '<option selected="selected" disabled>Select Bank</option>' +
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
                        '<input type="text" name="accountno[]" class="form-control iban" placeholder="IBAN Number" data-parsley-maxlength="24" data-parsley-minlength="24" data-parsley-type="alphanum" data-parsley-trigger="keyup" data-parsley-maxlength="24" data-parsley-minlength="24" required style ="text-transform:uppercase">' +
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
    <script>
        $(document).ready(function() {
            $("#pnumber").keyup(function () {
                var pno = $("#pnumber").val();
                console.log(pno);
                $.ajax({
                    type: 'POST',
                    url: '{{route('pno.check')}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        pno: pno,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#personal').html(response);
                    }
                    // if (response.success != null) {
                    //     $("#amount").val(response.success.retirement);
                    // } else {
                    //     $("#amount").val(null);
                    //     $("#r_date").val(null);
                    //     alert('Please Select Valid Date')
                    // }
                });
            });
        });
    </script>
@endsection
