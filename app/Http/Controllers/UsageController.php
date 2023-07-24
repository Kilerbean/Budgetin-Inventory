<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use App\Models\barang;
class UsageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usage=Usage::latest()->paginate(8);
        return view('usage.index',compact('usage'))
        ->with('i', (request()->input('page', 1) - 1) * 8);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang= barang::all();
        return view('usage.create', ['barang'=> $barang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Catalog_Number' => 'required',
            'Quantity' => 'required',
            'Expire_Date' => 'required',
            'Open_By' => 'required'
            
        ]);
        $barang = barang::where('Catalog_Number',$request ->Catalog_Number)->first();
        $usage = new usage();
   
        $usage ->Catalog_Number =$request ->Catalog_Number ;
        $usage ->Type_of_Material =$barang ->Type_of_Material ;
        $usage ->Name_of_Material =$barang ->Name_of_Material ;
        $usage ->Quantity =$request ->Quantity ;
        $usage ->Unit =$barang ->Unit ;
        $usage ->Open_By=$request ->Open_By;
        $usage ->Expire_Date =$request ->Expire_Date ;
    

        $usage -> save();
        
        // usage::create($request->all());
       

        return redirect()->route('usage.index')
                         ->with('success','Material Data Usage created.');
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
 

        $new_qty = $barang->Quantity - $request->Quantity;
        $barang->update(['Quantity'=>$new_qty]);
        $usage->update(['Status'=>1]);
        $usage->update(['Quantity'=>$request->Quantity]);
        $usage->update(['Open_By'=>$request->Open_By]);
        return redirect()->route('usage.index')->with('success','Material Data Di Confirm');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $usage)
    {
        $usage=Usage::find($usage);
        $usage->delete();
       
        return redirect()->route('usage.index')
                         ->with('success','Data deleted successfully');
    }
}
