<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\barang;
use App\Models\financial;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes=Income::latest()->paginate(8);
        // $incomes->status = true; // Mengubah nilai menjadi Diterima
        return view('income.index',compact('incomes'))
        ->with('i', (request()->input('page', 1) - 1) * 8);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang= barang::all();
        return view('income.create', ['barang'=> $barang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
        $request->validate([
            'No_PR' => 'required',
            'Catalog_Number' => 'required',
            'Quantity' => 'required',
            'Propose' => 'required',
            'No_PO' => 'required',
            'PO_Date' => 'required',
            'Expire_Date' => 'required',
            
        ]);
        $barang = barang::where('Catalog_Number',$request ->Catalog_Number)->first();
        $Total=$request ->Quantity * $barang ->Harga;
        $income = new Income();
   
        $income ->No_PR =$request ->No_PR ;
        $income ->Catalog_Number =$request ->Catalog_Number ;
        $income ->Type_of_Material =$barang ->Type_of_Material ;
        $income ->Name_of_Material =$barang ->Name_of_Material ;
        $income ->Quantity =$request ->Quantity ;
        $income ->Unit =$barang ->Unit ;
        $income ->Prices =$barang ->Harga ;
        $income ->Total =$Total;
        $income ->Propose =$request ->Propose ;
        $income ->No_PO =$request ->No_PO ;
        $income ->PO_Date =$request ->PO_Date ;
        $income ->Expire_Date =$request ->Expire_Date ;
    

        $income -> save();
        
        // Income::create($request->all());
       

        return redirect()->route('income.index')
                         ->with('success','Material Data Request Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $incomes)
    {
        return view('income.show',compact('incomes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $barang= barang::all();
        return view('income.edit',compact('income','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $income)
    {
        $request->validate([
            'No_PR' => 'required',
            'Catalog_Number' => 'required',
            'Quantity' => 'required',
            'Propose' => 'required',
            'No_PO' => 'required',
            'PO_Date' => 'required',
            'Expire_Date' => 'required',
        ]);
        $barang = barang::where('Catalog_Number',$request ->Catalog_Number)->first();
        $Total=$request ->Quantity * $barang ->Harga;
        $income=Income::find($income);

        $income ->No_PR =$request ->No_PR ;
        $income ->Catalog_Number =$request ->Catalog_Number ;
        $income ->Type_of_Material =$barang ->Type_of_Material ;
        $income ->Name_of_Material =$barang ->Name_of_Material ;
        $income ->Quantity =$request ->Quantity ;
        $income ->Unit =$barang ->Unit ;
        $income ->Prices =$barang ->Harga ;
        $income ->Total =$Total;
        $income ->Propose =$request ->Propose ;
        $income ->No_PO =$request ->No_PO ;
        $income ->PO_Date =$request ->PO_Date ;
        $income ->Expire_Date =$request ->Expire_Date ;
      
        $income ->save();
        return redirect()->route('income.index')
                         ->with('success','Material Data updated successfully');
    }
    public function updatediterima(Request $request,$income)
    {
        
        $request->validate([
            'No_PR' => 'required',     
            'Quantity' => 'required',
            
        ]);
   
        $income=Income::find($income);
      
        $barang = $income->Barang;
 
        $Total=$request ->Quantity * $barang ->Harga;
        $new_qty = $barang->Quantity + $request->Quantity;
        $barang->update(['Quantity'=>$new_qty]);
        $income->update(['Quantity'=>$request->Quantity]);
        $income->update(['No_PR'=>$request->No_PR]);
        $income->update(['Status'=>1]);
        
        $barang->update(['Expire_Date'=>$request->Expire_Date]);
        $typebudget = $income->Barang->Type_of_Budget;
        $bulantahun = date('M-y',strtotime($income->PO_Date));

        $financial = financial::where('Type_of_Budget',$typebudget)->where('bulan_tahun',$bulantahun)->first();
        //dd($bulantahun);
        $financial->actual = (!$financial->actual ? 0 : $financial->actual) + $Total ;
        $financial->save();

        return back()->with('success','Material Data Diterima');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $incomes)
    {
        $incomes=Income::find($incomes);
        $incomes->delete();
       
        return redirect()->route('income.index')
                         ->with('success','Data deleted successfully');
    }
}
