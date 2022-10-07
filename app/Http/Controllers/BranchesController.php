<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Branches;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $banks = Bank::all();
        $branches = Branches::all();
        return view('admin.branches.index' , compact('branches','banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branches();
        $branch->bank_id = $request->bank;
        $branch->branch_code = $request->branch_code;
        $branch->branch_desc = $request->branch_desc;
        $branch->save();
        return redirect()->back()->with('message', 'Branch Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function show(Branches $branches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function edit(Branches $branches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branches::find($id);
        $branch->bank_id = $request->bank;
        $branch->branch_code = $request->branch_code;
        $branch->branch_desc = $request->branch_desc;
        $branch->update();
        return redirect()->back()->with('message', 'Branch Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branches  $branches
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branches $branches)
    {
        //
    }
}
