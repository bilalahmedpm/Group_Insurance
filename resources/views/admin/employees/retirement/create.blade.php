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
                            <h3 class="card-title">Retirement Entry Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="entryform" data-parsley-ui-enabled="true" data-parsley-focus="first"  action="{{route('retirement.store')}}" method="post"
                                  enctype="multipart/form-data" >
                                @csrf
                                <div class="row">

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Personal Number</label>
                                            <input type="text" name="personalnumber" class="form-control pno" id="pnumber"
                                                   placeholder="Enter Personal Number"
                                                   data-inputmask-inputformat="99999999" data-mask
                                                   data-parsley-minlength="08" required
                                                   data-parsley-type="digits" data-parsley-trigger="keyup" autofocus >
                                            <div id="personal"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee CNIC</label>
                                            <input type="text" id="empcnic" name="employeecnic"
                                                   class="form-control cnic" placeholder="Enter CNIC"
                                                   data-inputmask-inputformat="9999999999999" data-mask
                                                   data-parsley-required data-parsley-trigger="keyup" data-parsley-minlength="13" data-parsley-maxlength="13"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" id="empname" name="employeename"
                                                   class="form-control name" placeholder="Enter Employee Name"
                                                   data-parsley-required data-parsley-trigger="keyup" style ="text-transform: capitalize" >
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
                                {{--                                Row1--}}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
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
                                                    required>
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

                                {{--                                Row 2--}}
                                <div class="row">

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nature of Claim</label>
                                            <select class="form-control" name="gitype" id="types" style="width: 100%;"
                                                    required>
                                                <option selected="selected" disabled> Select Gitype</option>
                                                <option value="01">Retirement</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date of Retirement</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="retirementdate" id="r_date"
                                                       class="form-control datemask"
                                                       data-inputmask-alias="datetime"
                                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Age on Date</label>
                                            <input type="text" name="ageondate" class="form-control" id="ageondate"
                                                   placeholder="Calculating......" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contribution</label>
                                            <input type="number" min="0" name="contribution" class="form-control "
                                                   placeholder="Contribution" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

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
                                    <div class="col-sm-2" >
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">

                                                </div>
                                                <input type="button" style="margin-top: 10px;" id="submit"
                                                       value="Calculate Amount"
                                                       class="form-control  btn btn-primary" >
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                </div>

                                <div class="row">
                                    <h5><u>Beneficiary Details</u></h5>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <select class="form-control select2" name="bank" id="bank"
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
                                            <select class="form-control select2 bankbranches" name="branch"
                                                    style="width: 100%;" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="accountno" class="form-control iban"
                                                   placeholder="IBAN Number" data-parsley-type="alphanum"
                                                   data-parsley-trigger="keyup" data-parsley-maxlength="24"
                                                   data-parsley-minlength="24" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" name="amount" id="amount" readonly class="form-control"
                                                   placeholder="calculating...." required>
                                        </div>
                                    </div>
                                </div>

                                {{--                                Attacments Section--}}
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Attachments</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Employee CNIC</label>
                                                    <input class="form-control fileupload" name="employee_cnic_img" type="file"
                                                           id="formFile" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Pension Roll Data Sheet</label>
                                                    <input class="form-control" name="employee_penshion_sheet"
                                                           type="file" id="formFile" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Retirement Order</label>
                                                    <input class="form-control" name="retirement_order" type="file"
                                                           id="formFile" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Stamp Paper</label>
                                                    <input class="form-control" name="stamp_paper" type="file"
                                                           id="formFile" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Contribution
                                                        Statement</label>
                                                    <input class="form-control" name="contribution_statement"
                                                           type="file" id="formFile" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Part III Form B</label>
                                                    <input class="form-control" name="part3_form" type="file"
                                                           id="formFile" required>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="btn btn-primary" >Submit</button>
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
        $('.entryform').parsley();
    </script>
    <script>
        $("#submit").click(function () {
            var dor = $("#r_date").val();
            var dob = $("#dob").val();
            // const per = $("#beneficiaries").val();
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
                    $("#r_date").val(null);
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
                                $("#amount").val(response.success.retirement);
                            } else {
                                $("#amount").val(null);
                                $("#r_date").val(null);
                                alert('Please Select Valid Date')
                            }
                        }
                    });
                }
            }

        });
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
