<?php

namespace App\Http\Controllers;


use Illuminate\Support\Carbon;
use App\Models\Calibration;

use Illuminate\Http\Request;
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
        
        return view('kalibrasi.listinstrument.create');
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


//DASHBOARD KALIBRASI


    public function dashboard()
    {
        $kalibrasinear = Calibration::where('nextcalibration', '>=', now())
        ->where('nextcalibration', '<', now()->addDays(30))
        ->get();

    $kalibrasiover = Calibration::where('nextcalibration', '<', now())
        ->get();

        

        return view('kalibrasi.dashboardkalibrasi.dashboard',compact('kalibrasinear','kalibrasiover'));
    }




}
