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
use App\objection;
use App\Relation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
        if ($user->role == 1) {
            $employees = Employee::where('gitype', '=', '01')->where('status','!=',3)->get();
        } else {
            $employees = Employee::where('gitype', '=', '01')->where('status','!=',3)->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.retirement.index', compact('employees'));
    }

    public function deathIndex()
    {
        $user = Auth::user();
        if ($user->role == 1 ) {
            $employees = Employee::with('legals')->where('status','!=',3)->where('gitype', '=', '02')->get();
        } else {
            $employees = Employee::with('legals')->where('status','!=',3)->where('gitype', '=', '02')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.death.index', compact('employees'));
    }

    public function deathafterIndex()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            $employees = Employee::with('legals')->where('status','!=',3)->where('gitype', '=', '03')->get();
        } else {
            $employees = Employee::with('legals')->where('status','!=',3)->where('gitype', '=', '03')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.death_after_retirement.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function show(Employee $employee)
    {//
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function edit(Employee $employee)
    {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employee $employee
     * @return Response
     */
    public function update(Request $request, Employee $employee)
    {//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return Response
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

        $empid = $employee->id;
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
        $getid = $employee->id;

        $bankcount = count($request->bank);
        // Legal Heir Model
        for ($i = 0; $i < $bankcount; $i++) {
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
        $employee->retirementdate = $request->retirementdate;
        $employee->dateofdeath = $request->deathdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = $request->beneficiaries;
        $employee->status = "0";  //pending
        $employee->contribution = "$request->contribution";
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;

        $employee->save();
        $getid = $employee->id;

        $bankcount = count($request->bank);
        // Legal Heir Model
        for ($i = 0; $i < $bankcount; $i++) {
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
        $employee = Employee::with('legals')->where('id', '=', $id)->first();
        $doc = EmployeeDocument::where('employee_id', '=', $id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.retirement.view', compact('employee', 'doc', 'branch', 'departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function retirement_edit($id)
    {
//        $legalheirs = Legalheir::where('employee_id' , '=' , $id)->first();
        $employee = Employee::with('legals')->where('id', '=', $id)->first();
        $doc = EmployeeDocument::where('employee_id', '=', $id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.retirement.edit', compact('employee', 'doc', 'branch', 'departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function retirement_update(Request $request, $id)
    {
        $user = Auth::user();
        $self = 1;
        $employee = Employee::find($id);
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
        $employee->status = "0";  //pending
        $employee->contribution = $request->contribution;
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;

        $employee->update();
        $getid = $employee->id;
        // Legal Heir Model
            $beneficiary =  legalheir::where('employee_id','=',$id)->first();
            $beneficiary->employee_id = $getid;
            $beneficiary->heircnic = $employee->employeecnic;
            $beneficiary->heirname = $employee->employeename;
            $beneficiary->relation_id = $self;
            $beneficiary->bank_id = $request->bank;
            $beneficiary->branch_id = $request->branch;
            $beneficiary->accountno = $request->accountno;
            $beneficiary->amount = $request->amount;
            $beneficiary->user_id = $user->id;
            $beneficiary->update();


        // Documents Model
        $documents = EmployeeDocument::where('employee_id', '=', $id)->first();
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


        return redirect()->back()->with('message', 'Claim Updated successfully');
    }

    public function deathview($id)
    {
//        $employees = Employee::find($id);
        $employees = Employee::with('legals')->where('id', '=', $id)->get();
        $doc = EmployeeDocument::where('employee_id', '=', $id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.death.view', compact('employees', 'doc', 'branch', 'departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function deathafterview($id)
    {
//        $employees = Employee::find($id);
        $employees = Employee::with('legals')->where('id', '=', $id)->get();
        $doc = EmployeeDocument::where('employee_id', '=', $id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.death_after_retirement.view', compact('employees', 'doc', 'branch', 'departments', 'designations', 'relations', 'grades', 'banks'));
    }

    public function pnocheck(Request $request)
    {
        if ($request->get('pno')) {
            $pno = $request->get('pno');
            $data = Employee::where('pno', $pno)->get();
            if ($data->count() > 0) {

                echo "<span class='text-danger'>Personal Number has been taken</span>";

            } else {
                echo "<span class='text-success'>Personal Number Available</span>";
            }
        }

    }

    public function department_report()
    {
//        $employee_id = Employee::where('status' ,2)->pluck('id');
//        $departments = Department::with('employees.legals')->whereHas('employees' , function ($q){
//            $q->where('status','=',2);
//        })->get();
//        dd($departments);


//        }])->has('employees')->orderBy('department_desc')->get();
//        $employees = Employee::with('department','legals','legals.bank','legals.branch')
//            ->where('status','=',2)->orderBy('department_id')
//            ->get();

//        $departments = Department::with('employees.legals')->whereHas('employees' , function ($q){
//            $q->where('status','=',2);
//        })->get();

        //ok query
        $departments = Department::with(['employees', 'employees' => function($query){
        $query->where('status','=',2);
        }])->whereHas('employees')->orderBy('department_desc')->get();
        $employee_id = Employee::where('status' ,2)->pluck('id');
        $total = Legalheir::whereIn('employee_id', $employee_id)->sum('amount');


        return view('admin.reports.department_report', compact('departments','total'));
    }

    public function bank_report()
    {
//        $legalheirs = Legalheir::with('bank','employee')->whereHas('employee',function($q){
//        $q->where('status','=',2);
//         })->orderBy('bank_id')->get();

//        $distributionRecords = Stocktransfer::with(array('unit'=>function($query){
//            $query->select('id','UnitPrefix');
//        },
//            'category'=>function($query){
//                $query->select('id','SKU');
//            },
//            'location'=>function($query){
//                $query->select('id','Alias', 'City', 'isHeadOffice', 'company_id', 'state_id');
//            },'towhichShop', 'fromwhichStore'
//        ))->latest()->get();

//        return $banks;
        //am coming ok

//        $banks = Bank::with(array('employees'=>function($query){
//            $query->where('status','=',2);
//    },'legalheirs'))->whereHas( 'legalheirs.employee')->get();


//        $banks = Bank::with('legalheirs')->with('legalheirs.employee')->map(function($query){
//            $query->where('legalheirs.employee.status','=',2);
//        })->whereHas('legalheirs')->get();

//        $employees = Employee::with('legals','legals.bank','legals.branch')->whereHas('legals.bank',function($q){
//            $q->orderBy('bank_id','ASC');
//        })->where('status','=',2)->get();
//        return $employees;
        $banks = Bank::with(array('legalheirs', 'legalheirs.employee'=>function($q){
            $q->where('status','=',2);
        }))->whereHas( 'legalheirs')->get();
        return view('admin.reports.bank_report', compact('banks'));
    }

    public function verify($id)
    {
        $emp = Employee::find($id);
        $emp->status = 2;
        $emp->update();
        return redirect()->back()->with('message', 'ALl Document Verify Successfully');
    }

    public function objection(Request $request)
    {
        $emp = Employee::find($request->id);
        $emp->status = 3;
        $emp->update();
        $obj = new objection();
        $obj->description = $request->description;
        $obj->employee_id = $emp->id;
        $obj->department_id = $emp->department_id;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        return redirect()->back()->with('message', 'Object Submit Successfully');

    }
    public function employeeObjection()
    {
        $user = Auth::user();
        if ($user->role == 1) {
//            $objection = objection::where('department_id', '=', $user->department_id)->pluck('employee_id');
            $employees = Employee::with('legals')->where('status', '=', 3)->get();
        }else{
            $objection = objection::where('department_id', '=', $user->department_id)->pluck('employee_id');
            $employees = Employee::with('legals')->whereIn('id', $objection)
            ->where('status', '=', 3)->where('department_id', '=', $user->department_id)->get();
        }
        return view('admin.employees.objections.index', compact('employees'));

    }
    public function deathEdit($id)
    {
//        $employees = Employee::find($id);
        $employees = Employee::with('legals')->where('id', '=', $id)->get();
        $doc = EmployeeDocument::where('employee_id', '=', $id)->first();
        $departments = Department::all();
        $designations = Designation::all();
        $relations = Relation::all();
        $grades = Grade::all();
        $banks = Bank::all();
        $branch = Branches::all();
        return view('admin.employees.death.edit', compact('employees', 'doc', 'branch', 'departments', 'designations', 'relations', 'grades', 'banks'));
    }
    public function deathUpdate(Request $request,$id)
    {


        $user = Auth::user();

        $employee = Employee::find($id);
        $employee->pno = $request->personalnumber;
        $employee->employeecnic = $request->employeecnic;
        $employee->employeename = $request->employeename;
        $employee->fathername = $request->fathername;
        $employee->dateofbirth = $request->dateofbirth;
        $employee->department_id = $request->department;
        $employee->designation_id = $request->designation;
        $employee->grade = $request->grade;
        $employee->dateofdeath = $request->deathdate;
        $employee->ageondate = $request->ageondate;
        $employee->beneficiaries = $request->beneficiaries;
        $employee->status = "0";  //pending
        $employee->contribution = "0";  //death case no contribution required
        $employee->contactno = $request->contact_no;
        $employee->user_id = $user->id;

        $employee->update();
        $getid = $employee->id;

        $bankcount = count($request->bank);
        // Legal Heir Model
        for ($i = 0; $i < $bankcount; $i++) {
            foreach ($request->id as $idsss) {
                $beneficiary = legalheir::where('id', '=', $idsss)->first();
            }
            $beneficiary->employee_id = $getid;
            $beneficiary->heircnic = $request->beneficiarycnic[$i];

            $beneficiary->heirname = $request->beneficiaryname[$i];
            $beneficiary->relation_id = $request->relation[$i];
            $beneficiary->bank_id = $request->bank[$i];
            $beneficiary->branch_id = $request->branch[$i];
            $beneficiary->accountno = $request->accountno[$i];
            $beneficiary->amount = $request->amount[$i];
            $beneficiary->user_id = $user->id;
            $beneficiary->update();
        }

        $documents = EmployeeDocument::where('employee_id', '=', $id)->first();
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
        $documents->update();

        return redirect()->back()->with('message', 'Claim Update successfully');
    }

    public function allclaims()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            $retirement  = Employee::where('gitype','=', '01')->where('status','!=', 3)->count();
            $death = Employee::where('gitype','=', '02')->where('status','!=', 3)->count();
            $death_after = Employee::where('gitype','=', '03')->where('status','!=', 3)->count();
            $objection = Employee::where('status', 3)->count();
            $employees = Employee::with('legals')->where('status','!=',3)->get();
        } else {
            $retirement  = Employee::where('gitype','=', '01')->where('status','!=', 3)->where('department_id', '=', $user->department_id)->count();
            $death = Employee::where('gitype','=', '02')->where('status','!=', 3)->where('department_id', '=', $user->department_id)->count();
            $death_after = Employee::where('gitype','=', '03')->where('status','!=', 3)->where('department_id', '=', $user->department_id)->count();
            $objection = Employee::where('status', 3)->where('department_id', '=', $user->department_id)->count();
            $employees = Employee::with('legals')->where('status','!=',3)->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.all_claims.index', compact('employees','retirement','death','death_after','objection'));
    }
    public function search()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            $employees = Employee::with('legals','legals.bank','legals.branch')->get();
        } else {
            $employees = Employee::with('legals','legals.bank','legals.branch')->where('department_id', '=', $user->department_id)->get();
        }

        return view('admin.employees.search.index' , compact('employees'));
    }
    public function test()
    {
        $count = Department::with('employees')->withCount('employees')->orderByRaw('department_desc')->groupBy('department_desc')
        ->whereHas('employees')->get();
        return view('text' , compact('count'));
    }
    public function department_pdf()
    {
//        $data = [
//            'title' => 'Welcome to Nicesnippets.com',
//            'date' => date('m/d/Y')
//        ];
//        $users = User::all();
//        view()->share(['users',$users, 'data' ,$data]);
        $departments = Department::with(['employees', 'employees' => function($query){
            $query->where('status','=',2);
        }])->whereHas('employees')->orderBy('department_desc')->get();
        $pdf = PDF::loadView('myPDF',[ 'departments' => $departments]);

//        return view('myPDF' ,compact('data','users','departments'));
        return $pdf->setPaper('legal','landscape')->download('nicesnippets.pdf');
        return view('myPDF');
    }
}
