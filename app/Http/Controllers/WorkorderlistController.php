<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Location;
use App\Models\Calibration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkorderlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kalibrasi=Calibration::latest()->whereNotNull('startbreakdown')->get();

        return view('kalibrasi.workorderlist.wol_index',compact('kalibrasi'));
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
    public function show(Calibration $calibration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calibration $kalibrasi)
    {
        $vendor=Vendor::get();
        $location=Location::get();
        return view('kalibrasi.workorderlist.wol_edit',compact('kalibrasi','vendor','location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calibration $kalibrasi)
    {
        $request->validate(
            [
                'startbreakdown' => 'required',
                'serviceby' => 'required',
                'location' => 'required',
                'nowo'=>'required',
            ],
        );

        $kalibrasi->location=$request->location;
        $kalibrasi->startbreakdown=$request->startbreakdown;
        $kalibrasi->serviceby=$request->serviceby;
        $kalibrasi->nowo=$request->nowo;
        $kalibrasi->startservicedate=$request->startservicedate;
        $kalibrasi->finishservice=$request->finishservice;
        $kalibrasi->requestor=$request->requestor;
        $kalibrasi->problem=$request->problem;
        $kalibrasi->rootcause=$request->rootcause;
        $kalibrasi->preventiveaction=$request->preventiveaction;
        $kalibrasi->Status=$request->Status;
        $kalibrasi->changepart=$request->changepart;
        $kalibrasi->save();
    
        return redirect()->route('index.workorderlist')
        ->with('success', 'Work Order List Updated ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calibration $calibration)
    {
        //
    }
}
