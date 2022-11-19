<?php

namespace App\Http\Controllers;

use App\Bank;
use App\payorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PayorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payorders = payorder::all();
        return view('admin.payorders.index',compact('payorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        $payorders = payorder::all();
        return view('admin.payorders.create',compact('banks','payorders'));
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
       $payorder = new payorder();
       $payorder->personalnumber = $request->personalnumber;
       $payorder->employeecnic = $request->employeecnic;
       $payorder->employeename= $request->employeename;
       $payorder->fund = $request->fund;
       $payorder->bank_id = $request->bank;
       $payorder->po_number = $request->po_number;
       $payorder->podate = $request->podate;
       $payorder->amount = $request->amount;
       $payorder->user_id = $user->id;
       $payorder->save();

        return redirect()->back()->with('message', 'Payorder Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banks = Bank::all();
        $payorder = payorder::find($id);
        return view('admin.payorders.view',compact('banks','payorder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks = Bank::all();
         $payorder = payorder::find($id);
        return view('admin.payorders.edit',compact('payorder','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $user = Auth::user();

        $payorder = payorder::find($id);
        $payorder->personalnumber = $request->personalnumber;
        $payorder->employeecnic = $request->employeecnic;
        $payorder->employeename= $request->employeename;
        $payorder->fund = $request->fund;
        $payorder->bank_id = $request->bank;
        $payorder->po_number = $request->po_number;
        $payorder->podate = $request->podate;
        $payorder->recievername = $request->recievername;
        $payorder->recievercnic = $request->recievercnic;
        $payorder->recievercontact = $request->recievercontact;
        $payorder->recievingdate = $request->recievingdate;
        $payorder->relation = $request->relation;
        $payorder->amount = $request->amount;
        $payorder->user_id = $user->id;
        $payorder->update();

        return redirect()->back()->with('message', 'Payorder Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
