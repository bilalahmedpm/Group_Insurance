<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Branches;
use App\Department;
use App\Designation;
use App\Employee;
use App\EmployeeDocument;
use App\Grade;
use App\Legalheir;
use App\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Table;
use PhpParser\Node\Stmt\DeclareDeclare;

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
        if ($user->role == 1 || $user->role == 2) {
            $employees = Employee::with('legals')->get();
            return view('admin.employee.index', compact('employees'));
        } else {
            $employees = Employee::with('legals')->where('department_id', '=', $user->department_id)->get();
            return view('admin.employee.index', compact('employees'));
        }
    }
    public function retirementindex()
    {
        $user = Auth::user();
        if ($user->role == 1 || $user->role == 2) {
            $employees = Employee::where('gitype','=','01')->get();
        } else {
            $employees = Employee::where('gitype','=','01')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.retirement.index', compact('employees'));
    }
    public function deathIndex()
    {
        $user = Auth::user();
        if ($user->role == 1 || $user->role == 2) {
            $employees = Employee::with('legals')->where('gitype','=','02')->get();
        } else {
            $employees = Employee::with('legals')->where('gitype','=','02')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.death.index', compact('employees'));
    }
    public function deathafterIndex()
    {
        $user = Auth::user();
        if ($user->role == 1 || $user->role == 2) {
            $employees = Employee::with('legals')->where('gitype','=','03')->get();
        } else {
            $employees = Employee::with('legals')->where('gitype','=','03')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.death_after_retirement.index', compact('employees'));
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
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return view('admin.employee.create', compact('departments', 'designations', 'relations', 'grades', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $employee = new employee();
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->gitype = $request->gitype;
        $employee->retirementdate = $request->retirementdate;
        $employee->dateofdeath = $request->deathdate;
        $employee->beneficiaries = $request->beneficiaries;
        if ($user->role == 1) {
            $employee->status = 'OK';
        } else {
            $employee->status = 'Pending';
        }
        $employee->contribution = $request->contribution;
        $employee->user_id = $user->id;
        $employee->save();

        $beneficiary = new legalheir();
        $beneficiary->employee_id = $employee->id;
        $beneficiary->heircnic = $request->beneficiarycnic;
        $beneficiary->heirname = $request->beneficiaryname;
        $beneficiary->relation_id = $request->relation;
        $beneficiary->bank_id = $request->bank;
        $beneficiary->branch_id = $request->branch;
        $beneficiary->accountno = $request->accountno;
        $beneficiary->amount = $request->amount;
        $beneficiary->user_id = $user->id;
        $beneficiary->save();

        return redirect()->back()->with('message', 'Record Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employee $employee
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
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return view('admin.employees.retirement.create', compact('departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function death()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return view('admin.employees.death.create', compact('departments', 'designations', 'relations', 'grades', 'banks'));

    }

    public function death_after_retirement()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        return view('admin.employees.death_after_retirement.create', compact('departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function retirement_store(Request $request)
    {
        $user = Auth::user();
        $self = "1";

        // Employee Model
        $employee = new employee();
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->gitype = $request->gitype;
        $employee->retirementdate = $request->retirementdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = "1";
        $employee->status = "0";  //pending
        $employee->contribution = $request->contribution;
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;
        $employee->save();

        $empid  = $employee->id;
        // Legal Heir Model
        $beneficiary = new legalheir();
        $beneficiary->employee_id = $empid;
        $beneficiary->heircnic = $employee->employeecnic;
        $beneficiary->heirname = $employee->employeename;
        $beneficiary->relation_id = $self;
        $beneficiary->bank_id = $request->bank;
        $beneficiary->branch_id = $request->branch;
        $beneficiary->accountno = $request->accountno;
        $beneficiary->amount = $request->amount;
        $beneficiary->user_id = $user->id;
        $beneficiary->save();

        // Documents Model
        $documents = new EmployeeDocument();
        //employee cnic
        if ($request->hasfile('employee_cnic_img')) {

            $image1 = $request->file('employee_cnic_img');
            $name = time() . 'employee_cnic_img' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->employee_cnic_img = 'employee_documents/' . $name;
        }
        // pension sheet
        if ($request->hasfile('employee_penshion_sheet')) {

            $image1 = $request->file('employee_penshion_sheet');
            $name = time() . 'employee_penshion_sheet' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->employee_pension_sheet_img = 'employee_documents/' . $name;
        }
        // retirement order
        if ($request->hasfile('retirement_order')) {

            $image1 = $request->file('retirement_order');
            $name = time() . 'retirement_order' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->retirement_order = 'employee_documents/' . $name;
        }
        //stamp paper
        if ($request->hasfile('stamp_paper')) {

            $image1 = $request->file('stamp_paper');
            $name = time() . 'stamp_paper' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->stamp_paper = 'employee_documents/' . $name;
        }
        // contribution statement
        if ($request->hasfile('contribution_statement')) {

            $image1 = $request->file('contribution_statement');
            $name = time() . 'contribution_statement' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->contribution_statement = 'employee_documents/' . $name;
        }
        // part III form B
        if ($request->hasfile('part3_form')) {

            $image1 = $request->file('part3_form');
            $name = time() . 'part3_form' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'employee_documents/';
            $image1->move($destinationPath, $name);
            $documents->part3form_b = 'employee_documents/' . $name;
        }

        $documents->employee_id = $employee->id;
        $documents->user_id = $user->id;
        $documents->save();


        return redirect()->back()->with('message', 'Claim Added successfully');
    }

    public function deathstore(Request $request)
    {

        $user = Auth::user();

        $employee = new employee();
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->gitype = $request->gitype;
        $employee->dateofdeath = $request->deathdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = $request->beneficiaries;
        $employee->status = "0";  //pending
        $employee->contribution = "0";  //death case no contribution required
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;

        $employee->save();
        $getid =$employee->id;

        $bankcount =  count($request->bank);
        // Legal Heir Model
        for ($i = 0 ; $i < $bankcount ; $i++)
        {
            $beneficiary = new legalheir();
            $beneficiary->employee_id = $getid;
            $beneficiary->heircnic = $request->beneficiarycnic[$i];
            $beneficiary->heirname = $request->beneficiaryname[$i];
            $beneficiary->relation_id = $request->relation[$i];
            $beneficiary->bank_id = $request->bank[$i];
            $beneficiary->branch_id = $request->branch[$i];
            $beneficiary->accountno = $request->accountno[$i];
            $beneficiary->amount = $request->amount[$i];
            $beneficiary->user_id = $user->id;
            $beneficiary->save();
        }

        $documents = new EmployeeDocument();
        if ($request->hasfile('employee_cnic_img')) {

            $image1 = $request->file('employee_cnic_img');
            $name = time() . 'employee_cnic_img' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name);
            $documents->employee_cnic_img = 'img/' . $name;
        }
        if ($request->hasfile('beneficiary_cnic')) {

            foreach ($request->file('beneficiary_cnic') as $image) {
                $name1 = time() . 'beneficiary_cnicc' . '.' . $image->getClientOriginalName();
                $destinationPath = 'img';
                $image->move($destinationPath, $name1);
                $data7[] = 'img/' . $name1;
            }

            $documents->beneficiary_cnic1_img = json_encode($data7);

        }

        if ($request->hasfile('death_certificate')) {

            $image1 = $request->file('death_certificate');
            $name1 = time() . 'death_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->death_certificate = 'img/' . $name1;
        }
        if ($request->hasfile('succession_certificate')) {

            $image1 = $request->file('succession_certificate');
            $name1 = time() . 'succession_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->succession_certificate = 'img/' . $name1;
        }
        if ($request->hasfile('death_form')) {

            $image1 = $request->file('death_form');
            $name1 = time() . 'death_form' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->death_claim_farm = 'img/' . $name1;
        }

        if ($request->hasfile('beneficiary_pension_sheet')) {

            foreach ($request->file('beneficiary_pension_sheet') as $image) {
                $name1 = time() . 'employee_penshion_sheet' . '.' . $image->getClientOriginalName();
                $destinationPath = 'img';
                $image->move($destinationPath, $name1);
                $data8[] = 'img/' . $name1;

            }
            $documents->beneficiary_pension_sheet1_img = json_encode($data8);

        }
        // retirement order
        if ($request->hasfile('last_pay_certificate')) {

            $image1 = $request->file('last_pay_certificate');
            $name1 = time() . 'last_pay_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->lpc = 'img/' . $name1;
        }
        //stamp paper
        if ($request->hasfile('bank_farm')) {

            $image1 = $request->file('bank_farm');
            $name1 = time() . 'bank_farm' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->bank_farm = 'img/' . $name1;
        }
        if ($request->hasfile('lpc')) {

            $image1 = $request->file('lpc');
            $name1 = time() . 'lpc' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->beneficiary_cnic2_img = 'img/' . $name1;
        }


        $documents->employee_id = $getid;
        $documents->user_id = $user->id;
        $documents->save();

        return redirect()->back()->with('message', 'Claim Added successfully');
    }

    public function deathRetirementStore(Request $request)
    {

        $user = Auth::user();

        $employee = new employee();
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->gitype = $request->gitype;
        $employee->dateofretirement = $request->retirementdate;
        $employee->dateofdeath = $request->deathdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = $request->beneficiaries;
        $employee->status = "0";  //pending
        $employee->contribution = "$request->contribution";
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;

        $employee->save();
        $getid =$employee->id;

        $bankcount =  count($request->bank);
        // Legal Heir Model
        for ($i = 0 ; $i < $bankcount ; $i++)
        {
            $beneficiary = new legalheir();
            $beneficiary->employee_id = $getid;
            $beneficiary->heircnic = $request->beneficiarycnic[$i];
            $beneficiary->heirname = $request->beneficiaryname[$i];
            $beneficiary->relation_id = $request->relation[$i];
            $beneficiary->bank_id = $request->bank[$i];
            $beneficiary->branch_id = $request->branch[$i];
            $beneficiary->accountno = $request->accountno[$i];
            $beneficiary->amount = $request->amount[$i];
            $beneficiary->user_id = $user->id;
            $beneficiary->save();
        }

        $documents = new EmployeeDocument();
        if ($request->hasfile('employee_cnic_img')) {

            $image1 = $request->file('employee_cnic_img');
            $name = time() . 'employee_cnic_img' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name);
            $documents->employee_cnic_img = 'img/' . $name;
        }
        if ($request->hasfile('beneficiary_cnic')) {

            foreach ($request->file('beneficiary_cnic') as $image) {
                $name1 = time() . 'beneficiary_cnicc' . '.' . $image->getClientOriginalName();
                $destinationPath = 'img';
                $image->move($destinationPath, $name1);
                $data7[] = 'img/' . $name1;
            }

            $documents->beneficiary_cnic1_img = json_encode($data7);

        }

        if ($request->hasfile('death_certificate')) {

            $image1 = $request->file('death_certificate');
            $name1 = time() . 'death_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->death_certificate = 'img/' . $name1;
        }
        if ($request->hasfile('succession_certificate')) {

            $image1 = $request->file('succession_certificate');
            $name1 = time() . 'succession_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->succession_certificate = 'img/' . $name1;
        }
        if ($request->hasfile('death_form')) {

            $image1 = $request->file('death_form');
            $name1 = time() . 'death_form' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->death_claim_farm = 'img/' . $name1;
        }

        if ($request->hasfile('beneficiary_pension_sheet')) {

            foreach ($request->file('beneficiary_pension_sheet') as $image) {
                $name1 = time() . 'employee_penshion_sheet' . '.' . $image->getClientOriginalName();
                $destinationPath = 'img';
                $image->move($destinationPath, $name1);
                $data8[] = 'img/' . $name1;

            }
            $documents->beneficiary_pension_sheet1_img = json_encode($data8);

        }
        // retirement order
        if ($request->hasfile('last_pay_certificate')) {

            $image1 = $request->file('last_pay_certificate');
            $name1 = time() . 'last_pay_certificate' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->lpc = 'img/' . $name1;
        }
        //Bank Farm
        if ($request->hasfile('bank_farm')) {

            $image1 = $request->file('bank_farm');
            $name1 = time() . 'bank_farm' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->bank_farm = 'img/' . $name1;
        }
        // LPC
        if ($request->hasfile('lpc')) {

            $image1 = $request->file('lpc');
            $name1 = time() . 'lpc' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'img/';
            $image1->move($destinationPath, $name1);
            $documents->beneficiary_cnic2_img = 'img/' . $name1;
        }

        $documents->employee_id = $getid;
        $documents->user_id = $user->id;
        $documents->save();

        return redirect()->back()->with('message', 'Claim Added successfully');
    }

    public function retirement_view($id)
    {
//        $legalheirs = Legalheir::where('employee_id' , '=' , $id)->first();
        $employee = Employee::with('legals')->where('id' , '=' , $id)->first();
        $doc = EmployeeDocument::where('employee_id','=',$id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.retirement.view', compact('employee','doc','branch','departments', 'designations', 'relations', 'grades', 'banks'));
    }
    public function retirement_edit($id)
    {
//        $legalheirs = Legalheir::where('employee_id' , '=' , $id)->first();
        $employee = Employee::with('legals')->where('id' , '=' , $id)->first();
        $doc = EmployeeDocument::where('employee_id','=',$id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.retirement.edit', compact('employee','doc','branch','departments', 'designations', 'relations', 'grades', 'banks'));
    }
    public function retirement_update(Request $request, $id)
    {
        $user = Auth::user();
        $self = "1";

        // Employee Model

        $employee = Employee::where('id','=',$id)->get();
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->gitype = $request->gitype;
        $employee->retirementdate = $request->retirementdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = "1";
        $employee->status = "0";  //pending
        $employee->contribution = $request->contribution;
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;
        $employee->save();


        $beneficiary = Legalheir::where('employee_id' , '=' , $id)->get();
        // Legal Heir Model
        $beneficiary->heircnic = $employee->employeecnic;
        $beneficiary->heirname = $employee->employeename;
        $beneficiary->relation_id = $self;
        $beneficiary->bank_id = $request->bank;
        $beneficiary->branch_id = $request->branch;
        $beneficiary->accountno = $request->accountno;
        $beneficiary->amount = $request->amount;
        $beneficiary->user_id = $user->id;
        $beneficiary->save();

//        // Documents Model
//        $documents = new EmployeeDocument();
//        //employee cnic
//        if ($request->hasfile('employee_cnic_img')) {
//
//            $image1 = $request->file('employee_cnic_img');
//            $name = time() . 'employee_cnic_img' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->employee_cnic_img = 'employee_documents/' . $name;
//        }
//        // pension sheet
//        if ($request->hasfile('employee_penshion_sheet')) {
//
//            $image1 = $request->file('employee_penshion_sheet');
//            $name = time() . 'employee_penshion_sheet' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->employee_pension_sheet_img = 'employee_documents/' . $name;
//        }
//        // retirement order
//        if ($request->hasfile('retirement_order')) {
//
//            $image1 = $request->file('retirement_order');
//            $name = time() . 'retirement_order' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->retirement_order = 'employee_documents/' . $name;
//        }
//        //stamp paper
//        if ($request->hasfile('stamp_paper')) {
//
//            $image1 = $request->file('stamp_paper');
//            $name = time() . 'stamp_paper' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->stamp_paper = 'employee_documents/' . $name;
//        }
//        // contribution statement
//        if ($request->hasfile('contribution_statement')) {
//
//            $image1 = $request->file('contribution_statement');
//            $name = time() . 'contribution_statement' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->contribution_statement = 'employee_documents/' . $name;
//        }
//        // part III form B
//        if ($request->hasfile('part3_form')) {
//
//            $image1 = $request->file('part3_form');
//            $name = time() . 'part3_form' . '.' . $image1->getClientOriginalExtension();
//            $destinationPath = 'employee_documents/';
//            $image1->move($destinationPath, $name);
//            $documents->part3form_b = 'employee_documents/' . $name;
//        }
//
//        $documents->employee_id = $employee->id;
//        $documents->user_id = $user->id;
//        $documents->save();


        return redirect()->back()->with('message', 'Claim Updated successfully');
    }

    public function deathview($id)
    {
//        $employees = Employee::find($id);
        $employees = Employee::with('legals')->where('id' , '=' , $id)->get();
        $doc = EmployeeDocument::where('employee_id','=',$id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.death.view', compact('employees','doc','branch','departments', 'designations', 'relations', 'grades', 'banks'));
    }
    public function deathafterview($id)
    {
//        $employees = Employee::find($id);
        $employees = Employee::with('legals')->where('id' , '=' , $id)->get();
        $doc = EmployeeDocument::where('employee_id','=',$id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.death_after_retirement.view', compact('employees','doc','branch','departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function pnocheck(Request $request)
    {
        if($request->get('pno')){
            $pno =  $request->get('pno');
            $data = Employee::where('pno',$pno)->get();
            if($data->count() > 0 ){

                echo "<span class='text-danger'>Personal Number has been taken</span>";

            }else{
                echo "<span class='text-success'>Personal Number Available</span>";
            }
        }
    }
    public function department_report()
    {
        $departments = Department::with('employees')->whereHas('employees')->get();
//        $employee = Department::with('employees')->whereHas('employees')->get();
//        $amount = [];
//foreach ($employee as $row)
//{
//    foreach($row->employees as $row1)
//    {
//        $amount = Legalheir::where('employee_id','=',$row1->id)->get();
//    }
//
//}
//dd($amount);
        return view('admin.reports.department_report', compact('departments'));
    }
    public function bank_report()
    {
        $banks = Bank::with('legalheirs')->whereHas('legalheirs')->get();
//        dd($banks);
        return view('admin.reports.bank_report', compact('banks'));
    }

}



























































































//        if ($request->beneficiarycnic) {
//            foreach ($request->beneficiarycnic as $beneficiarycnic) {
//
//                $data[] = $beneficiarycnic;
//                $employee->beneficiarycnic = json_encode($data);
//            }
//        }
//        if ($request->beneficiaryname) {
//            foreach ($request->beneficiaryname as $beneficiaryname) {
//                $data1[] = $beneficiaryname;
//                $employee->beneficiaryname = json_encode($data1);
//            }
//        }
//        if ($request->relation) {
//            foreach ($request->relation as $relation) {
//                $data2[] = $relation;
//                $employee->relation = json_encode($data2);
//            }
//        }
//        if ($request->bank) {
//            foreach ($request->bank as $bank) {
//                $data3[] = $bank;
//                $employee->bank = json_encode($data3);
//            }
//        }
//        if ($request->accountno) {
//            foreach ($request->accountno as $accountno) {
//                $data4[] = $accountno;
//                $employee->accountno = json_encode($data4);
//            }
//        }
//        if ($request->amount) {
//            foreach ($request->amount as $amount) {
//                $data5[] = $amount;
//                $employee->amount = json_encode($data5);
//            }
//        }
//        if ($request->branch) {
//            foreach ($request->branch as $branch) {
//                $data6[] = $branch;
//                $employee->branch = json_encode($data6);
//            }
//        }

//        $employee->save();
