@extends('admin.layouts.include')

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}" />
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
                            <h3 class="card-title">Entry Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="entryform" action="{{route('employee.store')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Personal Number</label>
                                            <input type="text" name="personalnumber" class="form-control pno" placeholder="Enter Personal Number" data-inputmask-inputformat="99999999" data-mask
                                             data-parsley-minlength="08" data-parsley-required data-parsley-type="digits" data-parsley-trigger="keyup">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee CNIC</label>
                                            <input type="text" id="empcnic" name="employeecnic" class="form-control cnic" placeholder="Enter CNIC" data-inputmask-inputformat="99999-9999999-9" data-mask >
                                        </div>
                                    </div>
                                </div>
                                {{--Row1--}}
                                <div class="row">

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input type="text" id="empname" name="employeename" class="form-control name" placeholder="Enter Employee Name"
                                            data-parsley-required data-parsley-trigger="keyup" >
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Father Name</label>
                                            <input type="text" name="fathername" class="form-control " placeholder="Father Name"
                                            data-parsley-required data-parsley-trigger="keyup">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="dateofbirth"  class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Deparment</label>
                                            <select class="form-control  select2" name ="department" style="width: 100%;" data-parsley-required>
                                                <option selected="selected" disabled>Select Department</option>
                                                @foreach( $departments as $department)
                                                    <option value="{{$department->id}}" >{{{$department->department_desc}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <select class="form-control  select2" name="designation" style="width: 100%;">
                                                <option selected="selected" disabled>Select Designation</option>
                                                @foreach( $designations as $designation)
                                                    <option value="{{$designation->id}}">{{{$designation->designation_desc}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{--Row 2 --}}
                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Grade</label>
                                            <select class="form-control select2"id="grade" name="grade" style="width: 100%;" required>
                                                <option selected="selected"  disabled >Select Grade</option>
                                                @foreach( $grades as $grade)
                                                    <option value="{{$grade->grade}}">{{{$grade->grade}}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nature of Claim</label>
                                            <select class="form-control select2 types"   name="gitype" id="types" style="width: 100%;" required>
                                                <option selected="selected" disabled>Select Gitype</option>
                                                <option value = "01">Retirement</option>
                                                <option value = "02">Death</option>
                                                <option value = "03">Death After Retirement</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" id="retirement">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date of Retirement</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="r_date" name="retirementdate" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-sm-2" id="death">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Date of Death</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="deathdate" id="d_date" class="form-control datemask" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Age on Date</label>
                                            <input type="text" name="ageondate" class="form-control" placeholder="Calculating......" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Beneficiaries</label>
                                            <input type="number" value="1" id="benef" min="1" max="5" name="beneficiaries" class="form-control " placeholder="beneficiaries" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Contribution</label>
                                            <input type="number" name="contribution" class="form-control " placeholder="Contribution" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5><u>Beneficiary Details</u></h5>
                                </div>
                                <div id="addmore">
                                <div class="row">

                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Beneficiary CNIC</label>
                                            <input type="text" id="benefcnic" name="beneficiarycnic" class="form-control cnic" placeholder="Beneficiary CNIC" required data-inputmask-inputformat="99999-9999999-9" data-mask>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Beneficiary Name</label>
                                            <input type="text" id="benefname" name="beneficiaryname" class="form-control" placeholder="Beneficiary Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Relation</label>
                                            <select class="form-control select2" id="rel" name="relation" style="width: 100%;" required>
                                                <option selected="selected">Select Relation</option>
                                                @foreach($relations as $relation)
                                                    <option value = "{{$relation->id}}">{{$relation->relation_desc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <a  class="btn btn-success" onclick="addmore()" style="margin-top:30px;"><i class="fa fa-user-plus"></i></a>
                                    </div>
                                </div>
                                    <div class="row" >
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <select class="form-control select2" name="bank" id="bank" style="width: 100%;" required>
                                                <option selected="selected" disabled>Select Bank</option>
                                                @foreach($banks as $bank)
                                                    <option value = "{{$bank->id}}">{{$bank->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <select class="form-control select2 bankbranches" name="branch" style="width: 100%;" required>

                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Account IBAN Number</label>
                                            <input type="text" name="accountno" class="form-control iban" placeholder="IBAN Number" data-parsley-type="alphanum" data-parsley-trigger="keyup"
                                            data-parsley-maxlength="24" data-parsley-minlength="24">
                                        </div>
                                    </div>

                                    <div class="col-sm-2" id="amount1" style="display: none">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" id="amount" name="amount" class="form-control" placeholder="calculating...." required>
                                        </div>
                                    </div>


                                </div>

                                </div>

                                <button  class="btn btn-primary">Submit</button>

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
         $('#entryform').parsley();
     </script>

     <script>

         $("#r_date").keyup(function(){
             var dor = $("#r_date").val();
             var types = $(".types").val();
             function isValidDate(date) {
                 var temp = date.split('/');
                 var d = new Date(temp[2] + '/' + temp[0] + '/' + temp[1]);
                 return (d && (d.getMonth() + 1) == temp[0] && d.getDate() == Number(temp[1]) && d.getFullYear() == Number(temp[2]));
             }
             console.log(isValidDate(dor))
             if(isValidDate(dor)) {
                 var grade = $("#grade").val();
                 if(grade==null){
                     alert('Please Select Grade')
                     $("#r_date").val(null);
                 }
                 else{
                     console.log(dor,grade);

                     $.ajax({
                         type: 'POST',
                         url: '{{route('fetchrate')}}',
                         data: {
                             _token: "{{ csrf_token() }}",
                             dor: dor,
                             grade: grade,
                         },
                         success: function (response) {
                             console.log(response);
                             if(response){
                                 $("#amount").val(response.retirement);
                                 $("#amount1").show();

                             }
                             else{
                                 $("#amount1").hide();
                             }


                         }
                     });

                 }

             }


         });

     </script>
     <script>

         $("#d_date").keyup(function(){
             var dor = $("#d_date").val();
             console.log(dor);
             var types = $(".types").val();

             function isValidDate(date) {
                 var temp = date.split('/');
                 var d = new Date(temp[2] + '/' + temp[0] + '/' + temp[1]);
                 console.log(d);
                 return (d && (d.getMonth() + 1) == temp[0] && d.getDate() == Number(temp[1]) && d.getFullYear() == Number(temp[2]));
             }
             console.log(isValidDate(dor))
             if(isValidDate(dor)) {
                 var grade = $("#grade").val();
                 if(grade==null){
                     alert('Please Select Grade')
                     $("#d_date").val(null);
                 }
                 else{
                     console.log(dor,grade);

                     $.ajax({
                         type: 'POST',
                         url: '{{route('fetchrate')}}',
                         data: {
                             _token: "{{ csrf_token() }}",
                             dor: dor,
                             grade: grade,
                         },
                         success: function (response) {
                             console.log(response);
                             if(response){
                                 $("#amount").val(response.death);
                                 $("#amount1").show();

                             }
                             else{
                                 $("#amount1").hide();
                             }


                         }
                     });

                 }

             }


         });

     </script>
     <script>
         function addmore() {
             $.post('{{route('addmore')}}', {_token: '{{csrf_token()}}'}, function (response) {
                 $('#addmore').html(response.data);
             });
         }

         function addmore() {
             var benef = $("#benef").val();

             $('#addmore').append('<div class="row">'+

                 '<div class="col-sm-2">'+
                 <!-- text input -->
            ' <div class="form-group">'+
                ' <label>Beneficiary CNIC</label>'+
            ' <input type="text" id="benefcnic" name="beneficiarycnic[]" class="form-control cnic" placeholder="Beneficiary CNIC" required data-inputmask-inputformat="99999-9999999-9" data-mask>'+
         '</div>'+
         '</div>'+

             '<div class="col-sm-2">'+
                 <!-- text input -->
                 '<div class="form-group">'+
                     '<label>Beneficiary Name</label>'+
                     '<input type="text" id="benefname" name="beneficiaryname[]" class="form-control" placeholder="Beneficiary Name" required>'+
                ' </div>'+
             '</div>'+

             '<div class="col-sm-2">'+
                 <!-- text input -->
                 '<div class="form-group">'+
                     '<label>Relation</label>'+
                    ' <select class="form-control select2" id="rel" name="relation[]" style="width: 100%;" required>'+
                        ' <option selected="selected">Select Relation</option>'+
                         '@foreach($relations as $relation)'+
                         '<option value = "{{$relation->id}}">{{$relation->relation_desc}}</option>'+
                        ' @endforeach'+
                   '  </select>'+
               '  </div>'+
            ' </div>'+
         '</div>' +

                 '<div class="row" >' +
                 '<div class="col-sm-2">' +

                 '<div class="form-group">' +
                 '<label>Bank Name</label>' +
                 ' <select class="form-control select2" name="bank[]" id="bank" style="width: 100%;" required>' +
                 '<option selected="selected" disabled>Select Bank</option>' +
                 '@foreach($banks as $bank)' +
                 ' <option value = "{{$bank->id}}">{{$bank->name}}</option>' +
                 ' @endforeach' +
                 ' </select>' +
                 ' </div>' +
                 '</div>' +

                 ' <div class="col-sm-2">' +
                 <!-- text input -->
                 ' <div class="form-group">' +
                 '<label>Branch</label>' +
                 ' <select class="form-control select2 bankbranches" name="branch[]" style="width: 100%;" required>' +

                 ' </select>' +
                 ' </div>' +
                 '</div>' +

                 '<div class="col-sm-2">' +
                 <!-- text input -->
                 '<div class="form-group">' +
                 ' <label>Account IBAN Number</label>' +
                 '<input type="text" name="accountno[]" class="form-control iban" placeholder="IBAN Number" data-parsley-type="alphanum" data-parsley-trigger="keyup" data-parsley-maxlength="24" data-parsley-minlength="24">' +
                 ' </div>' +
                 ' </div>' +

                 '<div class="col-sm-2" id="amount1" style="display: none">' +
                 ' <div class="form-group">' +
                 '  <label>Amount</label>' +
                 ' <input type="text" id="amount" name="amount[]" class="form-control" placeholder="calculating...." required>' +
                 '  </div>' +
                 ' </div>' +

                 ' <div class="col-sm-2">' +
                 ' <a  class="btn btn-danger" onclick="removecolor(this)" style="margin-top:30px;"><i class="fa fa-user-times" aria-hidden="true"></i></a>' +
                 '</div>' +
                 ' </div> ');
         }
         function removecolor(elem) {
             if($('#addmore .row').length>1) {
                 $(elem).parent('div').parent('div').remove();
             }
         }

     </script>
 @endsection
