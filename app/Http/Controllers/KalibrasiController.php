<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use App\Models\Calibration;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class KalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kalibrasi=Calibration::latest()->get();

        return view('kalibrasi.listinstrument.index',compact('kalibrasi'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendor=Vendor::get();
        return view('kalibrasi.listinstrument.create',compact('vendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'instrumentid' => 'required',
                'instrumentname' => 'required',
                'serialnumber' => 'required',
                'lastcalibration' => 'required|date',
                'frekuensicalibration' => 'required|numeric|min:1',
                'calibrationby' => 'required',
                'location' => 'required',
                'yearofinvestment' => 'required',
            ],
        );

        $kalibrasi= new Calibration();
        $kalibrasi->instrumentid=$request->instrumentid;
        $kalibrasi->instrumentname=$request->instrumentname;
        $kalibrasi->serialnumber=$request->serialnumber;
        $kalibrasi->lastcalibration=$request->lastcalibration;
        $kalibrasi->frekuensicalibration=$request->frekuensicalibration;
        $kalibrasi->calibrationby=$request->calibrationby;
        $kalibrasi->location=$request->location;
        $kalibrasi->needcalibration=1;
        $kalibrasi->yearofinvestment=$request->yearofinvestment;
         

        $lastCalibrationDate = Carbon::parse($request->lastcalibration);
        $nextCalibrationDate = $lastCalibrationDate->addMonths($request->frekuensicalibration);
        $kalibrasi->nextcalibration = $nextCalibrationDate;
        
        $kalibrasi->save();

        return redirect()->route('listKalibrasi')
        ->with('success', 'Instrument Data Created.');
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

        return view('kalibrasi.listinstrument.edit',compact('kalibrasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calibration $kalibrasi)
    {
        $request->validate(
            [
                'instrumentid' => 'required',
                'instrumentname' => 'required',
                'serialnumber' => 'required',
                'lastcalibration' => 'required|date',
                'frekuensicalibration' => 'required|numeric|min:1',
                'calibrationby' => 'required',
                'location' => 'required',
                'yearofinvestment' => 'required',
            ],
        );
  
        $kalibrasi->instrumentid=$request->instrumentid;
        $kalibrasi->instrumentname=$request->instrumentname;
        $kalibrasi->serialnumber=$request->serialnumber;
        $kalibrasi->lastcalibration=$request->lastcalibration;
        $kalibrasi->frekuensicalibration=$request->frekuensicalibration;
        $kalibrasi->calibrationby=$request->calibrationby;
        $kalibrasi->location=$request->location;
        $kalibrasi->yearofinvestment=$request->yearofinvestment;
         
        $lastCalibrationDate = Carbon::parse($request->lastcalibration);
        $nextCalibrationDate = $lastCalibrationDate->addMonths($request->frekuensicalibration);
        $kalibrasi->nextcalibration = $nextCalibrationDate;
       
        $kalibrasi->save();
     
        return redirect()->route('listKalibrasi')
            ->with('success', 'Instrument Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calibration $kalibrasi)
    {
      
        $kalibrasi->delete();
        return redirect()->route('listKalibrasi') ->with('success', 'Instrument Data Delete');
        // \auditmms(auth()->user()->name, 'Administrator Delete Instrument ',$kalibrasi->instrumentname, 'List Instrument', $kalibrasi->instrumentid, $kalibrasi->Quantity,0);
    }


// Tambah Vendor untuk Calibration By
public function vendor()
{
    return view('kalibrasi.listinstrument.vendor');
}

public function addvendor(Request $request)
{
    $request->validate(
        [
            'nama' => 'required',
        ],
    );

    $vendor= new Vendor();
    $vendor->nama=$request->nama;
    $vendor->save();
    return redirect()->route('listKalibrasi')
    ->with('success', 'Vendor Data Add successfully');

}

                            //DASHBOARD KALIBRASI


    public function dashboard()
    {
        $kalibrasinear = Calibration::where('nextcalibration', '>=', now())
        ->where('nextcalibration', '<', now()->addDays(30))
        ->get();

        $kalibrasiover = Calibration::where('nextcalibration', '<', now())
        ->get();

        $kalibrasibreak=Calibration::whereNotNull('startbreakdown')->get();

        return view('kalibrasi.dashboardkalibrasi.dashboard',compact('kalibrasinear','kalibrasiover','kalibrasibreak'));
    }





                            //Breakdown Kalibrasi

public function breakdown(Calibration $kalibrasi)
{

    $vendor=Vendor::get();
    return view('kalibrasi.listinstrument.breakdown',compact('kalibrasi','vendor'));
}

public function breakdownedit(Request $request, Calibration $kalibrasi)
{
    $request->validate(
        [
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason'=>'required',
            
        ],
    );

    $kalibrasi->instrumentid=$request->instrumentid;
    $kalibrasi->instrumentname=$request->instrumentname;
    $kalibrasi->location=$request->location;
    $kalibrasi->startbreakdown=$request->startbreakdown;
    $kalibrasi->serviceby=$request->serviceby;
    $kalibrasi->startservicedate=$request->startservicedate;
    $kalibrasi->finishservice=$request->finishservice;
    $kalibrasi->reason=$request->reason;
    $kalibrasi->save();

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Breakdown Data is Recorded ');
    
}
public function addbreakdown(Calibration $kalibrasi)
{
    $uniqueIncomes=Calibration::whereNull('startbreakdown')->get();
    $vendor=Vendor::get();


    return view('kalibrasi.listinstrument.addbreakdown',compact('kalibrasi','uniqueIncomes','vendor'));
}

public function addbreakdownedit(Request $request)
{
    $request->validate(
        [
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason'=>'required',
        ],
    );

    $kalibrasi=Calibration::where('instrumentid',$request->instrumentid)->where('needcalibration',1)->first();
   
  
    $kalibrasi->location=$request->location;
    $kalibrasi->startbreakdown=$request->startbreakdown;
    $kalibrasi->serviceby=$request->serviceby;
    $kalibrasi->startservicedate=$request->startservicedate;
    $kalibrasi->finishservice=$request->finishservice;
    $kalibrasi->reason=$request->reason;
    $kalibrasi->save();

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Breakdown Data is Recorded ');

}



                                //KALBRASI TEPAT WAKTU

public function ontime(Request $request, $kalibrasi)
{

    // $old= \getoldvalues('mysql','calibrations',$kalibrasi);
    // dd($old);
    // $old_nextcalibration=$old["old"]["nextcalibration"];

    // dd($old_nextcalibration);

    $kalibrasi=Calibration::find($kalibrasi);

    $kalibrasi->lastcalibration=$kalibrasi->nextcalibration;
    $kalibrasi->save();
 
    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;

    $kalibrasi->save();
    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Calibrated Successfully');
}




public function overcalibration(Calibration $kalibrasi)
{

    return view('',compact('kalibrasi'));
}

public function overcalibrationdone(Request $request,$kalibrasi)
{
    $request->validate(
        [
            'nodeviasi' => 'required',
            'lastcalibration' => 'required',

        ],
    );


    $kalibrasi=Calibration::find($kalibrasi);

    $kalibrasi->lastcalibration=$request->nextcalibration;


    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;

    $kalibrasi->save();
    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Calibrated Successfully');

}



}