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
                            <form id="entryform" action="{{route('retirement.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Personal Number</label>
                                            <input type="text"  value="{{$employee->pno}}" name="personalnumber" class="form-control pno" id="pnumber"
                                                   placeholder="Enter Personal Number"
                                                   data-inputmask-inputformat="99999999" data-mask
                                                   data-parsley-minlength="08" data-parsley-required
                                                   data-parsley-type="digits" data-parsley-trigger="keyup"  >
                                            <div id="personal"></div>
                                            @error('personalnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee CNIC</label>
                                            <input type="text" id="empcnic" value="{{$employee->employeecnic}}" name="employeecnic"
                                                   class="form-control cnic" placeholder="Enter CNIC"
                                                   data-inputmask-inputformat="99999-9999999-9" data-mask
                                                   data-parsley-required data-parsley-trigger="keyup"  >
                                            @error('personalnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" id="empname" value="{{$employee->employeename}}" name="employeename"
                                                   class="form-control name" placeholder="Enter Employee Name"
                                                   data-parsley-required data-parsley-trigger="keyup"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" name="fathername" value="{{$employee->fathername}}" class="form-control "
                                                   placeholder="Father Name"
                                                   data-parsley-required data-parsley-trigger="keyup" >
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
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" value="{{$employee->dateofbirth}}"  name="dateofbirth" id="dob"
                                                           class="form-control datemask"
                                                           data-inputmask-alias="datetime"
                                                           data-inputmask-inputformat="dd/mm/yyyy" data-mask required >
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control  select2"  name="department" style="width: 100%;"
                                                    data-parsley-required >
                                                <option selected="selected" disabled>Select Department</option>
                                                @foreach( $departments as $department)
                                                    <option
                                                        value="{{$department->id}}"{{$department->id == $employee->department_id ? "selected":""}}>{{{$department->department_desc}}}</option>
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
                                                        value="{{$designation->id}}" {{$designation->id == $employee->designation_id ? "selected":""}}>{{{$designation->designation_desc}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <select class="form-control select2"  id="grade" name="grade"
                                                    style="width: 100%;" required>
                                                <option selected="selected" disabled>Select Grade</option>
                                                @foreach( $grades as $grade)
                                                    <option
                                                        value="{{$grade->grade}}" {{$grade->grade == $employee->grade ? "selected":""}}>{{{$grade->grade}}}</option>
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
                                            <select class="form-control"  name="gitype" id="types" style="width: 100%;"
                                                    required>
                                                @if($employee->gitype=='01')
                                                    <option value="01" selected="selected">Retirement</option>
                                                @endif
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
                                                <input type="text" name="retirementdate" value="{{$employee->retirementdate}}"id="r_date"
                                                       class="form-control datemask"
                                                       data-inputmask-alias="datetime"
                                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask required >
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Age on Date</label>
                                            <input type="text" name="ageondate" value="{{$employee->ageondate}}" class="form-control" id="ageondate"
                                                   placeholder="Calculating......" required >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contribution</label>
                                            <input type="number" min="0" value="{{$employee->contribution}}" name="contribution" class="form-control "
                                                   placeholder="Contribution" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input type="text" name="contact_no" value="{{$employee->contactno}}" class="form-control "
                                                   placeholder="0331XXXXXXX" required >
                                        </div>
                                    </div>
                                    <div class="col-sm-2"  id="check" >
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

                                </div>
                                @foreach($employee->legals as $legal)
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
                                                        <option value="{{$bank->id}}" {{$bank->id == $legal->bank_id ? "selected":""}}>{{$bank->name}}</option>
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
                                                    @foreach($branch as $row)
                                                        <option value="{{$row->id}}" {{$row->id == $legal->branch_id ? "selected":""}}>{{$row->branch_desc}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" name="accountno" value="{{$legal->accountno}}" class="form-control iban"
                                                       placeholder="IBAN Number" data-parsley-type="alphanum"
                                                       data-parsley-trigger="keyup" data-parsley-maxlength="24"
                                                       data-parsley-minlength="24" required >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" name="amount" value="{{$legal->amount}}" id="amount"  class="form-control"
                                                       placeholder="calculating...." required >
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                                Attacments Section--}}
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
                                                    <a href="{{asset($doc->employee_cnic_img)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->employee_cnic_img)}}"
                                                             class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Employee Peshion Sheet</label>
                                                    <a href="{{asset($doc->employee_pension_sheet_img)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->employee_pension_sheet_img)}}"
                                                             class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Part III Form B</label>
                                                    <a href="{{asset($doc->part3form_b)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->part3form_b)}}"
                                                             class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Non Judicial Stamp Paper</label>
                                                    <a href="{{asset($doc->stamp_paper)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->stamp_paper)}}"
                                                             class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Contribution Statement</label>
                                                    <a href="{{asset($doc->contribution_statement)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->contribution_statement)}}"
                                                             class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Retirement Order</label>
                                                    <a href="{{asset($doc->retirement_order)}}" data-toggle="lightbox"
                                                       data-title="sample 1 - white" data-gallery="gallery">
                                                        <img src="{{asset($doc->retirement_order)}}" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>

                                                </div>
                                            </div>

                                        </div>

                                        {{--                                        <button class="btn btn-primary">Submit</button>--}}
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

