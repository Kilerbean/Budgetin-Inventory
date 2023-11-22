<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\barang;
use App\Models\Income;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsageRequest;
use Illuminate\Support\Facades\DB;

class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usage=Usage::latest()->where('Status', '1')->where('tipe_transaksi','1')->get();
        $materialusage=Usage::latest()->where('Status', '0')->where('tipe_transaksi','1')->get();
        $audit=Audit::latest()->where('sourcetable','Material Usage')->get();
        return view('usage.index',compact('usage','materialusage','audit'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $uniqueIncomes = DB::table('incomes')
    ->select('Catalog_Number', 'Name_of_Material') // Tambahkan kolom no_batch
    ->whereNotNull('no_batch')
    ->where('tipe_transaksi', '1')
    ->where('Quantity', '>', 0)
    ->groupBy('Catalog_Number', 'Name_of_Material') // Sesuaikan dengan kolom yang Anda pilih
    ->get();

    $openby = User::where(function ($query) {
        $query->whereIn('title', [
            'Material QC Analyst',
            'Finished Goods QC Analyst',
            'Microbiology QC Analyst',
            'Stability QC Analyst'
        ]);
    })
    ->where('Status', 1)
    ->get();

    $materialusage = Usage::latest()
        ->where('Status', '0')
        ->where('tipe_transaksi', '1')
        ->get();

    return view('usage.create', compact('uniqueIncomes', 'materialusage','openby'))->with('i');
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsageRequest $request)
    {
        
        //dd($barang->Quantity);
        // $request->validate([
        //     'Catalog_Number'=>'required|exists:incomes,Catalog_Number',
        //     'no_batch'=>'required',
        //     'Quantity' => 'required|numeric|min:1',
        //     'Open_By' => 'required',
        //     'usage'=>'required'
            
        // ]);
   
        $income = Income::where('no_batch',$request ->no_batch)
                        ->where('Catalog_Number',$request->Catalog_Number)
                        ->where('tipe_transaksi',1)->first();
        //$barang = barang::where('Catalog_Number',$income ->Catalog_Number)->first();
        $old= \getoldvalues('mysql','incomes',$income); 
        $old_stok = $old["old"]["Quantity"];$old["old"]["Quantity"];

        $barang = $income->Barang;
       
        if ($income->Quantity >= $request->Quantity) {
        $new_qty = $barang->Quantity - $request->Quantity;
        $newincome=$income->Quantity-$request->Quantity;

        $usage = new Usage();
   
        $usage ->Catalog_Number =$income->Catalog_Number ;
        $usage ->Type_of_Material =$income ->Type_of_Material ;
        $usage ->Name_of_Material =$income ->Name_of_Material ;
        $usage ->Quantity =$request ->Quantity ;
        $usage ->Unit =$income ->Unit ;
        $usage ->no_batch=$request->no_batch;
        $usage ->Open_By=$request->Open_By;
        $usage ->input_by =auth()->user()->name;
        $usage ->Expire_Date =$income -> Expire_Date ;
        $usage ->usage =$request->usage ;
        $usage ->Status=1;

        $usage -> save();

        $barang->update(['Quantity'=>$new_qty]);
        $usage->update(['Quantity'=>$request->Quantity]);
        $income->update(['Quantity'=>$newincome]);
        \auditmms(auth()->user()->name,'Create new Material Usage',$barang->Catalog_Number,'Material Usage',$request->no_batch,$old_stok,$newincome);    
        return redirect()->route('usage.index')
        ->with('success','Material Usage Created  successfully');
        }
        else {
            return back()->with('error','not enough stock from that batch number');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usage $usage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usage $usage)
    {
        
   
        return view('usage.edit',compact('usage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Usage $usage)
    {
        $old= \getoldvalues('mysql','usages',$usage); 

   
        $request->validate([
            'Catalog_Number' => 'required',
            'Quantity' => 'required',
            'Open_By' =>'required',
            'Expire_Date' => 'required',
        ]);
        // $usage=Usage::find($usage);
        $usage->update($request->all());
      
        return redirect()->route('usage.index')
                         ->with('success','Material Usage updated successfully');
    }
    public function updategunakan(Request $request,$usage)
    {
        
        $request->validate([ 
            'Quantity' => 'required',
            'Open_By' =>'required'
        ]);
   
        $usage=usage::find($usage);
      
        $barang = $usage->Barang;
        $income = $usage->Income;
 

        $new_qty = $barang->Quantity - $request->Quantity;
        $new_quan=$income->Quantity - $request->Quantity;
        if ($barang->Quantity > $request->Quantity) {

            
        $barang->update(['Quantity'=>$new_qty]);
        $usage->update(['Status'=>1]);
        $usage->update(['Quantity'=>$request->Quantity]);
        $income->update(['Quantity'=>$new_quan]);
        $usage->update(['Open_By'=>$request->Open_By]);
        
        \auditmms(auth()->user()->name,'Confirm Material Usage',$barang->Catalog_Number,'Material Usage',$income->no_batch,$income->Quantity,$request->Quantity);
        return redirect()->route('usage.index')->with('success','Material Data Confirmed');
        }else {
            return back()->with('danger','not enough stock');
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usage)
    {
        $usage=Usage::find($usage);
        $income=$usage->Income;
        $usage->delete();
        \auditmms(auth()->user()->name,'Administrator Delete Material Usage ',$usage->Catalog_Number,'Material Usage',$usage ->no_batch,$usage->Quantity,0);
        return redirect()->route('usage.index')
                         ->with('success','Data deleted successfully');
    }

    public function getBatches($income)
    {
        $batches = Income::where('Catalog_Number', $income)
        ->where('tipe_transaksi','1')
        ->whereNotNull('no_batch')
        ->where('Quantity', '>', 0)
        ->where('Status','1')->get();

        return response()->json(['batches' => $batches]);
    }


}
