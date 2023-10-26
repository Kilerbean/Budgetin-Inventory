<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use App\Models\Location;

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
        $location=Location::get();
        return view('kalibrasi.listinstrument.create',compact('vendor','location'));
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
                'location' => 'required'
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
        $vendor=Vendor::get();
        $location=Location::get();
        return view('kalibrasi.listinstrument.edit',compact('kalibrasi','vendor','location'));
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
               
            ],
        );
  
        $kalibrasi->instrumentid=$request->instrumentid;
        $kalibrasi->instrumentname=$request->instrumentname;
        $kalibrasi->serialnumber=$request->serialnumber;
        $kalibrasi->lastcalibration=$request->lastcalibration;
        $kalibrasi->frekuensicalibration=$request->frekuensicalibration;
        $kalibrasi->calibrationby=$request->calibrationby;
        $kalibrasi->location=$request->location;
         
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

        $jadwalkalibrasi=Calibration::whereNotNull('jadwalkalibrasi')->get();

        return view('kalibrasi.dashboardkalibrasi.dashboard',compact('kalibrasinear','kalibrasiover','kalibrasibreak','jadwalkalibrasi'));
    }





                            //Instrument Breakdown

public function breakdown(Calibration $kalibrasi)
{

    $vendor=Vendor::get();
    $location=Location::get();
    return view('kalibrasi.listinstrument.breakdown',compact('kalibrasi','vendor','location'));
}

public function breakdownedit(Request $request, Calibration $kalibrasi)
{
    $request->validate(
        [
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason_breakdown'=>'required',
        ],

    );

    $kalibrasi->instrumentid=$request->instrumentid;
    $kalibrasi->instrumentname=$request->instrumentname;
    $kalibrasi->nowo=$request->nowo;
    $kalibrasi->location=$request->location;
    $kalibrasi->startbreakdown=$request->startbreakdown;
    $kalibrasi->serviceby=$request->serviceby;
    $kalibrasi->startservicedate=$request->startservicedate;
    $kalibrasi->finishservice=$request->finishservice;
    $kalibrasi->reason_breakdown=$request->reason_breakdown;
    $kalibrasi->save();

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Breakdown Data is Recorded ');
    
}
public function addbreakdown(Calibration $kalibrasi)
{
    $uniqueIncomes=Calibration::whereNull('startbreakdown')->get();
    $vendor=Vendor::get();
    $location=Location::get();


    return view('kalibrasi.listinstrument.addbreakdown',compact('kalibrasi','uniqueIncomes','vendor','location'));
}

public function addbreakdownedit(Request $request)
{
    $request->validate(
        [
            'instrumentid'=>'required',
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason_breakdown'=>'required',
        ],
    );

    $kalibrasi=Calibration::where('instrumentid',$request->instrumentid)->where('needcalibration',1)->first();
   
  
    $kalibrasi->location=$request->location;
    $kalibrasi->startbreakdown=$request->startbreakdown;
    $kalibrasi->serviceby=$request->serviceby;
    $kalibrasi->startservicedate=$request->startservicedate;
    $kalibrasi->finishservice=$request->finishservice;
    $kalibrasi->reason_breakdown=$request->reason_breakdown;
    $kalibrasi->save();

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Breakdown Data is Recorded ');

}



                                //KALBRASI TEPAT WAKTU

public function ontime(Request $request, $kalibrasi)
{



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
    $location=Location::get();
    $vendor=Vendor::get();
    return view('kalibrasi.listinstrument.editoverdue',compact('kalibrasi','location','vendor'));
}

public function overcalibrationdone(Request $request,$kalibrasi)
{
    $request->validate([

        'reason_overdue' => 'required',
        'lastcalibration' => 'required',
        'nodeviasi' => 'required',
        'calibrationby'=>'required',
    ]);

    $kalibrasi = Calibration::find($kalibrasi);
    $kalibrasi->update(['reason_overdue' => $request->reason_overdue]);
    $kalibrasi->update(['lastcalibration' => $request->lastcalibration]);
    $kalibrasi->update(['nodeviasi' => $request->nodeviasi]);

    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;
    $kalibrasi->save();



    
    return back()->with('success', 'The Instrument Has Been Calibrated Successfully');
}

//JADWALKAN KALIBRASI
public function jadwal(Calibration $kalibrasi)
{
    $uniqueIncomes=Calibration::whereNull('startbreakdown')->get();
    $vendor=Vendor::get();
    $location=Location::get();


    return view('kalibrasi.listinstrument.jadwalkalibrasi',compact('kalibrasi','uniqueIncomes','vendor','location'));
}

public function jadwalkalibrasi(Request $request , Calibration $kalibrasi)
{
    $request->validate(
        [
            
           'instrumentid'=>'required',
            'jadwalkalibrasi' => 'required',
            'calibrationby' => 'required',
            'location'=>'required',
        ],
    );

    $kalibrasi=Calibration::where('instrumentid',$request->instrumentid)->where('needcalibration',1)->first();

    $kalibrasi->location=$request->location;
    $kalibrasi->calibrationby=$request->calibrationby;
    $kalibrasi->jadwalkalibrasi=$request->jadwalkalibrasi;
    $kalibrasi->save();

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Calbration is scheduled ');


}

public function terjadwal(Request $request, $kalibrasi)
{

    $kalibrasi=Calibration::find($kalibrasi);

    $kalibrasi->lastcalibration=$kalibrasi->jadwalkalibrasi;
    $kalibrasi->save();
 
    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;
    $kalibrasi->jadwalkalibrasi=NULL;

    $kalibrasi->save();
    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Calibrated Successfully');
}













}