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
                            <h3 class="card-title">Payorder Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="entryform" data-parsley-ui-enabled="true" data-parsley-focus="first"  action="{{route('payorder.update' , $payorder->id)}}" method="post"
                                  enctype="multipart/form-data" >
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Fund</label>
                                            <select class="form-control  select2" name="fund" style="width: 100%;"
                                                    disabled>
                                                <option selected="selected"  disabled>Select Fund</option>
                                                <option value="01"  {{ $payorder->fund == '01' ? 'selected' : '' }}>Group Insurace</option>
                                                <option value="02" {{ $payorder->fund == '02' ? 'selected' : '' }}>Benevolent Fund</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                {{--                                Row1--}}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Personal Number</label>
                                            <input type="text" name="personalnumber" class="form-control pno" id="pnumber"
                                                   placeholder="Enter Personal Number" value="{{$payorder->personalnumber}}"
                                                   data-inputmask-inputformat="99999999" data-mask
                                                   data-parsley-minlength="08" required readonly
                                                   data-parsley-type="digits" data-parsley-trigger="keyup" autofocus >
                                            <div id="personal"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Employee CNIC</label>
                                            <input type="text" id="empcnic" name="employeecnic"
                                                   class="form-control cnic" placeholder="Enter CNIC" value="{{$payorder->employeecnic}}"
                                                   data-inputmask-inputformat="9999999999999" data-mask readonly
                                                   data-parsley-required data-parsley-trigger="keyup" data-parsley-minlength="13" data-parsley-maxlength="13">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Beneficiary Name</label>
                                            <input type="text" id="empname" name="employeename" value="{{$payorder->employeename}}"
                                                   class="form-control name" placeholder="Enter Beneficiary Name" readonly
                                                   data-parsley-required data-parsley-trigger="keyup" style ="text-transform: capitalize" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bank</label>
                                            <select class="form-control select2" disabled name="bank" id="bank"
                                                    style="width: 100%;" required >
                                                <option selected="selected" disabled>Select Bank</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{$bank->id}}"  {{ $bank->id == $payorder->bank_id ? 'selected' : '' }}>{{$bank->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Payorder Number</label>
                                            <input type="text" name="po_number" class="form-control" value="{{$payorder->po_number}}"
                                                   placeholder="Enter payorder number" required readonly
                                                   data-parsley-trigger="keyup" autofocus >
                                            <div id="personal"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Payorder Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="podate" value="{{$payorder->podate}}"
                                                       class="form-control datemask"
                                                       data-inputmask-alias="datetime" readonly
                                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" name="amount"  class="form-control" value="{{$payorder->amount}}"
                                                   placeholder="Enter Amount" required readonly>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Reciever Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Reciever Name</label>
                                        <input type="text"  name="recievername" value="{{$payorder->recievername}}" required readonly
                                               class="form-control" placeholder="Name" data-parsley-trigger="keyup" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Reciever CNIC</label>
                                        <input type="text" id="empcnic" name="recievercnic" value="{{$payorder->recievercnic}}" required
                                               class="form-control cnic" placeholder="Enter CNIC" readonly
                                               data-inputmask-inputformat="9999999999999" data-mask
                                               data-parsley-trigger="keyup" data-parsley-minlength="13" data-parsley-maxlength="13" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Relation</label>
                                        <input type="text" name="relation" required value="{{$payorder->relation}}"
                                               class="form-control" placeholder="Relation With Employee" readonly
                                               data-parsley-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Recieving Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" name="recievingdate" value="{{$payorder->recievingdate}}"
                                                   class="form-control datemask" readonly
                                                   data-inputmask-alias="datetime"
                                                   data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
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
                                            <input type="text" class="form-control" name="recievercontact" value="{{$payorder->recievercontact}}" placeholder="03#########" required readonly
                                                   minlength="11" maxlength="11"  data-parsley-trigger="keyup">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    </form>
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
@endsection
