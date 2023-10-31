<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Location;
use App\Models\Calibration;
use Illuminate\Http\Request;
use App\Models\Auditcalibration;
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
                'nowo'=>'required',
            ],
        );

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
    

        $kalibrasis = Auditcalibration::create([
            'instrumentid' => $kalibrasi->instrumentid,
            'instrumentname' => $kalibrasi->instrumentname,
            'nowo'=>$kalibrasi->nowo,
            'location'=>$kalibrasi->location,
            'serviceby' => $kalibrasi->serviceby,
            'tipe_data'=>2,
            'requestor'=>$kalibrasi->requestor,
            'breakdowndate'=>$kalibrasi->startbreakdown,
            'problem'=>$kalibrasi->problem,
            'Status'=>$kalibrasi->Status,
            'startservicedate'=>$kalibrasi->startservicedate,
            'finishservice'=>$kalibrasi->finishservice,
            'rootcause'=>$kalibrasi->rootcause,
            'preventiveaction'=>$kalibrasi->preventiveaction,
            'changepart'=>$kalibrasi->changepart,
        ]);


        return redirect()->route('index.workorderlist')
        ->with('success', 'Work Order List Updated ');

    }

    public function doneWO(Request $request,$kalibrasi)
    {
  
        $kalibrasi=Calibration::find($kalibrasi);

        if ($kalibrasi->nowo ==NULL) {
            return redirect()->back()->with('error', 'The column "No WO" must be filled.');
        } 
        elseif ($kalibrasi->startbreakdown == NULL) {
            return redirect()->back()->with('error', 'The column Start Start Breakdown must be filled.');
        }
        elseif ($kalibrasi->startservicedate == NULL) {
            return redirect()->back()->with('error', 'The column "Start Service Date" must be filled.');
        }
        elseif ($kalibrasi->finishservice == NULL) {
            return redirect()->back()->with('error', 'The column "Finish Service" must be filled.');
        }
        elseif ($kalibrasi->location == NULL) {
            return redirect()->back()->with('error', 'The column "Location" must be filled.');
        }
        elseif ($kalibrasi->serviceby == NULL) {
            return redirect()->back()->with('error', 'The column "Service By" must be filled.');
        }
        elseif ($kalibrasi->requestor == NULL) {
            return redirect()->back()->with('error', 'The column "Requestor" must be filled.');
        }
        elseif ($kalibrasi->problem == NULL) {
            return redirect()->back()->with('error', 'The column "Problem" must be filled.');
        }
        elseif ($kalibrasi->rootcause == NULL) {
            return redirect()->back()->with('error', 'The column "Root Cause" must be filled.');
        }
        elseif ($kalibrasi->preventiveaction == NULL) {
            return redirect()->back()->with('error', 'The column "Preventive Action" must be filled.');
        }
        elseif ($kalibrasi->Status == 0) {
            return redirect()->back()->with('error', 'The column "Status" need Solve.');
        }
        


        $kalibrasis = Auditcalibration::create([
            'instrumentid' => $kalibrasi->instrumentid,
            'instrumentname' => $kalibrasi->instrumentname,
            'nowo'=>$kalibrasi->nowo,
            'location'=>$kalibrasi->location,
            'serviceby' => $kalibrasi->serviceby,
            'tipe_data'=>2,
            'requestor'=>$kalibrasi->requestor,
            'breakdowndate'=>$kalibrasi->startbreakdown,
            'problem'=>$kalibrasi->problem,
            'Status'=>$kalibrasi->Status,
            'startservicedate'=>$kalibrasi->startservicedate,
            'finishservice'=>$kalibrasi->finishservice,
            'rootcause'=>$kalibrasi->rootcause,
            'preventiveaction'=>$kalibrasi->preventiveaction,
            'changepart'=>$kalibrasi->changepart,
        ]);



    
        $kalibrasi->startbreakdown=NULL;
        $kalibrasi->serviceby=NULL;
        $kalibrasi->nowo=NULL;
        $kalibrasi->startservicedate=NULL;
        $kalibrasi->finishservice=NULL;
        $kalibrasi->requestor=NULL;
        $kalibrasi->problem=NULL;
        $kalibrasi->rootcause=NULL;
        $kalibrasi->preventiveaction=NULL;
        $kalibrasi->Status=0;
        $kalibrasi->changepart=0;
        $kalibrasi->save();

    
        return redirect()->route('index.workorderlist')
        ->with('success', 'Work Order List Done ');

    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calibration $calibration)
    {
        //
    }
}
