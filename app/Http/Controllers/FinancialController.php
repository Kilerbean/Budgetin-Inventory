<?php

namespace App\Http\Controllers;

use App\Models\financial;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   return view('financial.index',[
    'financial' =>financial::get(),
   ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(financial $financial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(financial $financial)
    {
        return view('financial.edit',compact('financial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, financial $financial)
    {
        $request->validate([
            'budget' => 'required',
            'Keterangan' => 'required'

        ]);
        

        // $financial->update($request->all());
        $financial ->budget = $request ->budget;
        $financial ->Keterangan = $request ->Keterangan;
        

        $financial->save();

       
        return back()->with('success','Financial Budget updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(financial $financial)
    {
        //
    }
}
