<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\barang;
use App\Models\financial;
use App\Models\Usage;

use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::latest()->where('Status', '0')->whereNotNull('No_PO')->where('tipe_transaksi', '1')->get();
        $incomess = Income::latest()->whereNotNull('No_PO')->where('Status', '1')->where('tipe_transaksi', '1')->where('Quantity','>','0')->get();
        $incomeskurang = Income::latest()->whereNull('No_PO')->get();
        $audit = DB::table('audits')->latest()->where('sourcetable', 'Incoming Material')->get();
        // $incomes->status = true; // Mengubah nilai menjadi Diterima
        return view('income.index', compact('incomess', 'incomeskurang', 'incomes', 'audit'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barang::latest()->where('Status', '1')->get();
        $incomes = Income::latest()->where('Status', '0')->whereNotNull('No_PO')->get();
        return view('income.create', compact('barang', 'incomes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'Catalog_Number' => 'required',
                'Propose' => 'required',
                'request_by' => 'required',
                'No_PR' => 'required',
                'Quantity' => 'required|numeric|min:1',
            ],

        );

        $barang = barang::where('Catalog_Number', $request->Catalog_Number)->first();
        $Total = $request->Quantity * $barang->Harga;
        $income = new Income();

        $income->No_PR = $request->No_PR;
        $income->Catalog_Number = $request->Catalog_Number;
        $income->Type_of_Material = $barang->Type_of_Material;
        $income->Name_of_Material = $barang->Name_of_Material;
        $income->Quantity = $request->Quantity;

        $income->Unit = $barang->Unit;
        $income->packingsize = $barang->packingsize;
        $income->packingsize_unit = $barang->packingsize_unit;
        $income->Prices = $barang->Harga;
        $income->Total = $Total;
        $income->Propose = $request->Propose;
        $income->PO_Date =now()->toDateString();
        $income->request_by = $request->request_by;
        $income->input_by = auth()->user()->name;
        $income->Expire_Date = $request->Expire_Date;


        $income->save();

        // Income::create($request->all());

        \auditmms(auth()->user()->name, 'Create new request purchasing', $request->Catalog_Number, 'Incoming Material', 'N/A', 0, $request->Quantity);
        return redirect()->route('income.index')
            ->with('success', 'Material Data Request Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $incomes)
    {
        // return view('income.show',compact('incomes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $barang = barang::all();
        return view('income.edit', compact('income', 'barang'));
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
            'request_by' => 'required',

        ]);
        $barang = barang::where('Catalog_Number', $request->Catalog_Number)->first();
        $Total = $request->Quantity * $barang->Harga;
        $income = Income::find($income);

        $income->No_PR = $request->No_PR;
        $income->Catalog_Number = $request->Catalog_Number;
        $income->Type_of_Material = $barang->Type_of_Material;
        $income->Name_of_Material = $barang->Name_of_Material;
        $income->Quantity = $request->Quantity;
        $income->Unit = $barang->Unit;
        $income->packingsize = $barang->packingsize;
        $income->packingsize_unit = $barang->packingsize_unit;
        $income->Prices = $barang->Harga;
        $income->Total = $Total;
        $income->Propose = $request->Propose;
        $income->No_PO = $request->No_PO;
        $income->PO_Date = $request->PO_Date;
        $income->Expire_Date = $request->Expire_Date;
        $income->request_by = $request->request_by;
        $income->input_by = auth()->user()->name;

        $income->save();
        return redirect()->route('Barang.show',$barang->id)
            ->with('success', 'Material Data updated successfully');
    }
    public function updatediterima(Request $request, $income)
    {

        $request->validate([
            'No_PO' => 'required',
            'Quantity' => 'required',
            'no_batch' => 'required',
            'Expire_Date' => 'required',
        ]);

        $income = Income::find($income);
        $barang = $income->Barang;
        $old= \getoldvalues('mysql','incomes',$income); 
        $old_stok = $old["old"]["Quantity"];
        
        if ($old_stok > $request->Quantity) {
            $qty_new=$old_stok - $request->Quantity;
            $Total = $request->Quantity * $barang->Harga;
            $new_qty = $barang->Quantity + $request->Quantity;
            $newtotal=$qty_new * $barang->Harga;
            $barang->update(['Quantity' => $new_qty]);
            $income->update(['Quantity' => $request->Quantity]);
            $income->update(['No_PO' => $request->No_PO]);
            $income->update(['Status' => 1]);
    
            $income->no_batch = $request->no_batch;
            $income->Expire_Date = $request->Expire_Date;
            $income->save();

            $income->no_batch = $request->no_batch;
            $income->Expire_Date = $request->Expire_Date;
            $income->save();
    
            $typebudget = $income->Barang->Type_of_Budget;
            $bulantahun = date('M-y', strtotime($income->PO_Date));
            $financial = financial::where('Type_of_Budget', $typebudget)->where('bulan_tahun', $bulantahun)->first();
            $financial->actual = (!$financial->actual ? 0 : $financial->actual) + $Total;
            $financial->save();

            $incomesh = Income::create([
                'No_PR' => $income->No_PR,
                'Catalog_Number' => $barang->Catalog_Number,
                'Type_of_Material' => $barang->Type_of_Material,
                'Name_of_Material' => $barang->Name_of_Material,
                'Quantity' => $request->Quantity,
                'Unit' => $barang->Unit,
                'packingsize'=>$income->packingsize,
                'packingsize_unit'=>$income->packingsize_unit,
                'Prices' => $barang->Harga,
                'Total' => $Total,
                'Propose' => $income->Propose,
                'No_PO' => $income->No_PO,
                'PO_Date' => $income->PO_Date,
                'Expire_Date' => $request->Expire_Date,
                'Status' => 1,
                'no_batch' => $request->no_batch,
                'input_by' => auth()->user()->name,
                'request_by' => $income->request_by,
                'tipe_transaksi' => 4,
            ]);
            $incomesss = Income::create([
                'No_PR' => $income->No_PR,
                'Catalog_Number' => $barang->Catalog_Number,
                'Type_of_Material' => $barang->Type_of_Material,
                'Name_of_Material' => $barang->Name_of_Material,
                'Quantity' => $qty_new,
                'Unit' => $barang->Unit,
                'packingsize'=>$income->packingsize,
                'packingsize_unit'=>$income->packingsize_unit,
                'Prices' => $barang->Harga,
                'Total' => $newtotal,
                'Propose' => $income->Propose,
                'No_PO' => $income->No_PO,
                'PO_Date' => $income->PO_Date,
                'Status' => 0,
                'input_by' => auth()->user()->name,
                'request_by' => $income->request_by,
            ]);

    
            //dikarenakan nilai awalnya  
            \auditmms(auth()->user()->name, 'Confirm material arrival', $barang->Catalog_Number, 'Incoming Material', $request->no_batch, 0, $request->Quantity);
            return back()->with('success', 'Material Data Received');

        }
        elseif($old_stok == $request->Quantity) {
        $Total = $request->Quantity * $barang->Harga;
        $new_qty = $barang->Quantity + $request->Quantity;
        $barang->update(['Quantity' => $new_qty]);
        $income->update(['Quantity' => $request->Quantity]);
        $income->update(['No_PO' => $request->No_PO]);
        $income->update(['Status' => 1]);
        $income->no_batch = $request->no_batch;
        $income->Expire_Date = $request->Expire_Date;
        $income->save();

        $typebudget = $income->Barang->Type_of_Budget;
        $bulantahun = date('M-y', strtotime($income->PO_Date));
        $financial = financial::where('Type_of_Budget', $typebudget)->where('bulan_tahun', $bulantahun)->first();
        $financial->actual = (!$financial->actual ? 0 : $financial->actual) + $Total;
        $financial->save();
        $incomesh = Income::create([
            'No_PR' => $income->No_PR,
            'Catalog_Number' => $barang->Catalog_Number,
            'Type_of_Material' => $barang->Type_of_Material,
            'Name_of_Material' => $barang->Name_of_Material,
            'Quantity' => $request->Quantity,
            'Unit' => $barang->Unit,
            'packingsize'=>$income->packingsize,
            'packingsize_unit'=>$income->packingsize_unit,
            'Prices' => $barang->Harga,
            'Total' => $Total,
            'Propose' => $income->Propose,
            'No_PO' => $income->No_PO,
            'PO_Date' => $income->PO_Date,
            'Expire_Date' => $request->Expire_Date,
            'Status' => 1,
            'no_batch' => $request->no_batch,
            'input_by' => auth()->user()->name,
            'request_by' => $income->request_by,
            'tipe_transaksi' => 4,
        ]);

        //dikarenakan nilai awalnya  
        \auditmms(auth()->user()->name, 'Confirm material arrival', $barang->Catalog_Number, 'Incoming Material', $request->no_batch, 0, $request->Quantity);
        return back()->with('success', 'Material Data Received');
        }
        elseif($old_stok < $request->Quantity){
            return back()->with('warning', 'The amount of material that arrived exceeded what was ordered, please check again');
        }
    }



    
    public function inputpo(Request $request, $income)
    {
        $request->validate([

            'No_PO' => 'required',
        ]);

        $income = Income::find($income);
        $income->update(['No_PO' => $request->No_PO]);
        
        return back()->with('success', 'Material Data updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */

    public function kosongkan($income)
    {
        $income = Income::find($income);
        $barang = $income->Barang;
        $olds = \getoldvalues('mysql', 'incomes', $income);
        $old_stok = $olds["old"]["Quantity"];
        $newstok = $barang->Quantity - $income->Quantity;
        $barang->update(['Quantity' => $newstok]);
        $income->update(['Quantity' => 0]);

        \auditmms(auth()->user()->name, 'empty expired material ', $barang->Catalog_Number, 'Incoming Material', $income->no_batch, $old_stok, 0);
        return back()->with('success', 'Material Data empty');
    }

    public function destroy(string $incomes)
    {
        $incomes = Income::find($incomes);
        $barang=$incomes->Barang;
        $newqty=$barang->Quantity-$incomes->Quantity;
        $barang->update(['Quantity' => $newqty]);
        $incomes->delete();
        \auditmms(auth()->user()->name, 'Administrator Delete material income', $incomes->Catalog_Number, 'Incoming Material', $incomes->no_batch, $incomes->Quantity,0);
        return back()->with('success', 'Data deleted successfully');
    }


    public function deadstock()
    { 
        
        $incomes = Income::latest()->where('Quantity', '0')
            ->where('Status', '1')
            ->where('tipe_transaksi', '1')->get();
        return view('income.includelist.listdeadstock', compact('incomes'))
            ->with('i');
            
    }

    public function quantity($income)
    {
        $income = Income::find($income);
        $barang = $income->Barang;

        return view('income.editquantity', compact('income','barang'));
    }

    public function editquantity(Request $request,$income)
    {

        $request->validate([
            'reason' => 'required',
            'Quantity' => 'required',
        ]);
        $income = Income::where('tipe_transaksi','1')
                          ->where('Status','1')
                          ->find($income);
        $old = \getoldvalues('mysql', 'incomes', $income);
    
        $old_stok = $old["old"]["Quantity"];
        $barang = $income->Barang;

        if ($old_stok < $request->Quantity) {
            $Total = $request->Quantity - $old_stok;
            $totalharga = $Total * $barang->Harga;
            $newqty=$barang->Quantity + $Total;
            $incomes = Income::create([
                'No_PR' => 000,
                'Catalog_Number' => $income->Catalog_Number,
                'Type_of_Material' => $barang->Type_of_Material,
                'Name_of_Material' => $barang->Name_of_Material,
                'Quantity' => $Total,
                'Unit' => $barang->Unit,
                'packingsize'=>$income->packingsize,
                'packingsize_unit'=>$income->packingsize_unit,
                'Prices' => $barang->Harga,
                'Total' => $totalharga,
                'Propose' => 'Adjust Materials',
                'No_PO' => 000,
                'PO_Date' => now(),
                'Expire_Date' => now(),
                'Status' => 1,
                'no_batch' => $income->no_batch,
                'input_by' => auth()->user()->name,
                'request_by' => auth()->user()->name,
                'tipe_transaksi' => 2,
                'reason'=>$request->reason
            ]);
            $income->Quantity=$request->Quantity;
            $income->save();
            $barang->update(['Quantity' =>$newqty]);

            
            \auditmms(auth()->user()->name, 'Adjust Material Stock Manually', $income->Catalog_Number,'List of Material',$income->no_batch, round($old_stok, 0), $request->Quantity);
            return back()->with('success', 'Material Data was saved  ');
        } elseif ($old_stok > $request->Quantity) {
            $Total = $old_stok - $request->Quantity;
            $newqty=$barang->Quantity - $Total;
            $usage = Usage::create([
                'Catalog_Number' => $income->Catalog_Number,
                'Type_of_Material' => $income->Type_of_Material,
                'Name_of_Material' => $income->Name_of_Material,
                'Quantity' => $Total,
                'Unit' => $barang->Unit,
                'no_batch' =>$income->no_batch,
                'Expire_Date' => now(),
                'Open_By' => Auth()->user()->name,
                'Status' => 1,
                'tipe_transaksi' => 3,
                'input_by' => auth()->user()->name,
                'reason'=>$request->reason
            ]);
            $income->Quantity = $request->Quantity;

            $income->save();
            $barang->update(['Quantity' =>$newqty]);
            \auditmms(auth()->user()->name, 'Adjust Material  stock manually', $barang->Catalog_Number, 'List of Material', $income->no_batch, round($old_stok, 0), $request->Quantity);
            return back()->with('success', 'Material Data was saved');
        } else {
            return back()->with('info', 'No stock changes');
        }
    }

}
