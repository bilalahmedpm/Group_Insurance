<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Branches;
use App\Department;
use App\Designation;
use App\Employee;
use App\Grade;
use App\Legalheir;
use App\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 1 || $user->role == 2 ){
            $employees = Employee::with('legals')->get();
            return  view('admin.employee.index' ,compact('employees'));
        }
        else{
        $employees = Employee::with('legals')->where('department_id' ,'=', $user->department_id)->get();
        return  view('admin.employee.index' ,compact('employees'));
    }
    }
    public function department_report()
    {
        $departments = Department::with('employees')->get();
        return view('admin.reports.department_report' ,compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        $employees = Employee::with('legals')->get();
        $departments = Department::all();
        $designations = Designation::all();
        $relations= Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return  view('admin.employee.create' ,compact('departments' , 'designations','relations','grades','banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

//        $this->validate($request ,[
//
//            "pno"  => "required|min:8|max:8",
//            "employeecnic" => "required|min:15|max:15",
//            "employeename" => "required|max:255",
//            "fathername" => "required|max:255",
//            "dateofbirth" => "required",
//            "dateofdeath" => "required",
//            "department" => "required",
//            "designation" => "required",
//            "grade" => "required",
//            "gitype" => "required",
//            "dor" => "required",
//            "contribution" => "required",
//            "relation" => "requried",
//            "bank" => "required",
//            "branch" => "required",
//            "accountno" => "required",
//            "amount" => "required"
//        ]);
        $employee                 = new employee();
        $employee->pno            = $request->personalnumber;
        $employee->employeecnic   = $request->employeecnic;
        $employee->employeename   = $request->employeename;
        $employee->fathername     = $request->fathername;
        $employee->dateofbirth    = $request->dateofbirth;
        $employee->department_id  = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade          = $request->grade;
        $employee->gitype         = $request->gitype;
        $employee->retirementdate = $request->retirementdate;
        $employee->dateofdeath    = $request->deathdate;
        $employee->legalheirs     = $request->beneficiaries;
        if ($user->role == 1 ){
            $employee->status         = 'OK';
        }
        else{
            $employee->status         = 'Pending';
        }
        $employee->contribution   = $request->contribution;
        $employee->user_id        = $user->id;
        $employee->save();

        $beneficiary              = new legalheir();
        $beneficiary->employee_id = $employee->id;
        $beneficiary->heircnic    = $request->beneficiarycnic;
        $beneficiary->heirname    = $request->beneficiaryname;
        $beneficiary->relation_id = $request->relation;
        $beneficiary->bank_id     = $request->bank;
        $beneficiary->branch_id   = $request->branch;
        $beneficiary->accountno   = $request->accountno;
        $beneficiary->amount      = $request->amount;
        $beneficiary->user_id     = $user->id;
        $beneficiary->save();

        return redirect()->back()->with('message' , 'Record Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    public function retirement()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $relations= Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return  view('admin.employees.retirement.index' ,compact('departments' , 'designations','relations','grades','banks'));
    }

}
