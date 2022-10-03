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

    <div class="col-sm-2">
        <a href="" class="btn btn-danger" onclick="addmore()" style="margin-top:30px;"><i class="fa fa-user-plus"></i></a>
    </div>
</div>
