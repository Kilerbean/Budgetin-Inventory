<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use App\Models\Location;

use App\Models\Calibration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Auditcalibration;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Validated;
use App\Mail\rejectedcalibration;

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

    public function statuskalibrasiaktif($kalibrasi)
    {
        $kalibrasi = Calibration::find($kalibrasi);
        $kalibrasi->update(['status_instrument' => 1]);

        \auditmms(auth()->user()->name, 'Activate Instrument',$kalibrasi->instrumentid, 'Calibration', 'Status', 'Inactive', 'Active');
        session()->flash('info', 'Instrument has been Active.');
        return redirect()->route('listKalibrasi');
    }

    public function statusnkalibrasinonaktif($kalibrasi)
    {
        $kalibrasi = Calibration::find($kalibrasi);
        $kalibrasi->update(['status_instrument' => 0]);
        \auditmms(auth()->user()->name, 'Deactivate Instrument',$kalibrasi->instrumentid, 'Calibration', 'Status', 'Active', 'Inactive');
        session()->flash('info', 'Instrument has been Inactive.');
        return redirect()->route('listKalibrasi');
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
                'location' => 'required',
                'yearofinvestment' => 'required|numeric|min:2000',
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
        $kalibrasi->yearofinvestment=$request->yearofinvestment;
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
    public function show($kalibrasi)
    {
        $kalibrasi=Calibration::find($kalibrasi);
        $kalibrasiontime=Auditcalibration::where('instrumentid', $kalibrasi->instrumentid)
        ->where('tipe_data',1)
        ->get();

        $breakdown=Auditcalibration::where('instrumentid', $kalibrasi->instrumentid)
        ->where('tipe_data',2)
        ->get();

        $audit = DB::table('audits')->latest()->where('recordid',$kalibrasi->instrumentid)->get();

        return view('kalibrasi.listinstrument.show',compact('kalibrasi','kalibrasiontime','breakdown','audit'));
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
                'yearofinvestment' => 'required',
               
            ],
        );
        $old= \getoldvalues('mysql','calibrations',$kalibrasi);    
        
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
        $kalibrasi->nextcalibration = date('Y-m-d',strtotime($nextCalibrationDate));
        //dd($kalibrasi->nextcalibration);
        $kalibrasi->save();
        \startauditkalibrasi($kalibrasi, $old['fields'], $old['old'],'List of Material', 'Edit instrument Data'); 
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
        ->where('status_approval',1)
        ->where('status_instrument',1)
        ->get();

        $kalibrasiover = Calibration::where('nextcalibration', '<', now())
        ->where('status_instrument',1)
        ->get();

        $kalibrasibreak=Calibration::whereNotNull('startbreakdown')->get();

        $jadwalkalibrasi=Calibration::whereNotNull('jadwalkalibrasi')
        ->where('status_instrument',1)
        ->where('status_approval',4)
        ->get();

        return view('kalibrasi.dashboardkalibrasi.dashboard',compact('kalibrasinear','kalibrasiover','kalibrasibreak','jadwalkalibrasi'));
    }



//list Approval di dashboard

public function  aproval()
{
    $kalibrasifinal = Calibration::where('status_approval',2)
    ->where('status_instrument',1)
    ->get();

    $kalibrasiditolak = Calibration::where('status_approval',3)
    ->where('status_instrument',1)
    ->get();

    return view('kalibrasi.dashboardkalibrasi.approval',compact('kalibrasifinal','kalibrasiditolak'));
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
            'instrumentid'=>'required|exists:calibrations,instrumentid',
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason_breakdown'=>'required',
        ],

    );

    $kalibrasi->instrumentid=$request->instrumentid;
    $kalibrasi->instrumentname=$request->instrumentname;
    $kalibrasi->nowo=$request->nowo;
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
            'instrumentid'=>'required|exists:calibrations,instrumentid',
            'startbreakdown' => 'required',
            'serviceby' => 'required',
            'reason_breakdown'=>'required',
        ],
    );

    $kalibrasi=Calibration::where('instrumentid',$request->instrumentid)->where('needcalibration',1)->first();
   
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


    $kalibrasis = Auditcalibration::create([
        'input_by'=> auth()->user()->name,
        'instrumentid' => $kalibrasi->instrumentid,
        'instrumentname' => $kalibrasi->instrumentname,
        'lastcalibration' =>$kalibrasi->lastcalibration,
        'calibrationby' => $kalibrasi->calibrationby,
        'statuskalibrasi' =>'On Time',
        'tipe_data'=>1,

    ]);


    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Calibrated Successfully');
}




public function overcalibration(Calibration $kalibrasi)
{
    $location=Location::get();
    $vendor=Vendor::get();
    return view('kalibrasi.listinstrument.editoverdue',compact('kalibrasi','location','vendor'));
}



public function overcalibrationsave(Request $request,$kalibrasi)
{
   

    $kalibrasi = Calibration::find($kalibrasi);
     $kalibrasi->update(['reason_overdue' => $request->reason_overdue]);
     $kalibrasi->update(['nodeviasi' => $request->nodeviasi]);
     $kalibrasi->update(['lastcalibration' => $request->lastcalibration]);
     $kalibrasi->update(['calibrationby' => $request->calibrationby]);


     return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Calbration is save ');

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

    $kalibrasi->update(['lastcalibration' => $request->lastcalibration]);
    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;

    $kalibrasi->save();

    $kalibrasis = Auditcalibration::create([
        'input_by'=>auth()->user()->name,
        'instrumentid' => $kalibrasi->instrumentid,
        'instrumentname' => $kalibrasi->instrumentname,
        'lastcalibration' =>$kalibrasi->lastcalibration,
        'calibrationby' => $kalibrasi->calibrationby,
        'statuskalibrasi' =>'Delayed Calibration',
        'tipe_data'=>1,
        'nodeviasi' => $request->nodeviasi,
        'reason_overdue' => $request->reason_overdue,

    ]);
    // $kalibrasi->update(['reason_overdue' => $request->reason_overdue]);
    // $kalibrasi->update(['nodeviasi' => $request->nodeviasi]);

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Calbration is Done ');
}



                        //JADWALKAN KALIBRASI
public function jadwal(Calibration $kalibrasi)
{

    $uniqueIncomes=Calibration::whereNull('startbreakdown')
    ->where('nextcalibration', '>=', now())
    ->where('status_approval',1) 
    ->where('status_instrument',1)

    ->get();
    $vendor=Vendor::get();
    $location=Location::get();


    return view('kalibrasi.listinstrument.jadwalkalibrasi',compact('kalibrasi','uniqueIncomes','vendor','location'));
}

public function jadwalkalibrasi(Request $request , Calibration $kalibrasi)
{
    $request->validate(
        [
            
           'instrumentid'=>'required|exists:calibrations,instrumentid',
            'jadwalkalibrasi' => 'required',
            'calibrationby' => 'required',

        ],
    );

    $kalibrasi=Calibration::where('instrumentid',$request->instrumentid)->where('needcalibration',1)->first();


    $kalibrasi->calibrationby=$request->calibrationby;
    $kalibrasi->jadwalkalibrasi=$request->jadwalkalibrasi;
    $kalibrasi->status_approval=4;
    $kalibrasi->save();


    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'Instrument Calbration is scheduled ');


}

public function terjadwal(Request $request, $kalibrasi)
{

    $kalibrasi=Calibration::find($kalibrasi);
    $kalibrasi->status_approval=2;
    $kalibrasi->save();
    
    

    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Confirm Calibration schedule');
}





public function terjadwalfinal(Request $request, $kalibrasi)
{

    $kalibrasi=Calibration::find($kalibrasi);

    $kalibrasi->status_approval=1;

    $kalibrasi->lastcalibration=$kalibrasi->jadwalkalibrasi;
    $kalibrasi->save();
 
    $lastCalibrationDate = Carbon::parse($kalibrasi->lastcalibration);
    $nextCalibrationDate = $lastCalibrationDate->addMonths($kalibrasi->frekuensicalibration);
    $kalibrasi->nextcalibration = $nextCalibrationDate;
    $kalibrasi->jadwalkalibrasi=NULL;
    $kalibrasi->reason_notapprove=NULL;
    $kalibrasi->save();

    $kalibrasis = Auditcalibration::create([
        'input_by'=>  auth()->user()->name,
        'instrumentid' => $kalibrasi->instrumentid,
        'instrumentname' => $kalibrasi->instrumentname,
        'lastcalibration' =>$kalibrasi->lastcalibration,
        'calibrationby' => $kalibrasi->calibrationby,
        'statuskalibrasi' =>'On Schedule',
        'tipe_data'=>1,

    ]);



    return redirect()->route('dashboard.kalibrasi')
    ->with('success', 'The Instrument Has Been Approved Calibration Schedule');
}




public function terjadwalgagal(Request $request, $kalibrasi)
{
    $request->validate(
        [
            
           'reason_notapprove'=>'required',

        ], ['reason_notapprove.required' => 'Reason Rejected  is required']
        
    );

    $kalibrasi=Calibration::find($kalibrasi);

    $kalibrasi->status_approval=3;
    $kalibrasi->reason_notapprove=$request->reason_notapprove;

    $kalibrasi->save();
 //EMAIL
    
        $levels = [6];
        $recipients = User::whereIn('leveluser',$levels)->get();
        foreach($recipients as $recipient){
            $emailto[]=$recipient->email;
        }
     $kalibrasiz=$kalibrasi;
        Mail::to($emailto)                 
        ->send(new rejectedcalibration($kalibrasiz));





    return redirect()->route('listkalibrasi.approval')
    ->with('success', 'The Instrument Has Been Refused to Be Calibrated');
}





public function jadwaledit(Calibration $kalibrasi)
{

    $vendor=Vendor::get();

    return view('kalibrasi.listinstrument.jadwalkalibrasiedit',compact('kalibrasi','vendor'));
}


public function jadwalkalibrasiedit(Request $request ,$kalibrasi)
{
    $request->validate(
        [
          
            'jadwalkalibrasi' => 'required',
            'calibrationby' => 'required',

        ],
    );

    $kalibrasi=Calibration::find($kalibrasi);
    $kalibrasi->calibrationby=$request->calibrationby;
    $kalibrasi->jadwalkalibrasi=$request->jadwalkalibrasi;
    $kalibrasi->save();


    return redirect()->route('listkalibrasi.approval')
    ->with('success', 'Instrument Calbration is Updated ');


}

public function terjadwalrevisi(Request $request, $kalibrasi)
{

    $kalibrasi=Calibration::find($kalibrasi);
    $kalibrasi->status_approval=2;
    $kalibrasi->reason_notapprove=NULL;
    $kalibrasi->save();

    return redirect()->route('listkalibrasi.approval')
    ->with('success', 'The Instrument Has Been Confirm Revision Calibration schedule');
}





}