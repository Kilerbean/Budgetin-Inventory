<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use App\Models\barang;
use App\Models\Income;
use App\Models\Opname;
use App\Models\Materialcode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorebarangRequest;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Http\Requests\UpdatebarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */



     public function index(Request $request)
     {
         // Mengambil nilai "Type_of_Material" dari sesi (jika ada)
         $filterTypeOfMaterial = $request->input('Type_of_Material');

    $barangsQuery = Barang::where('Status', '1');

    if (!empty($filterTypeOfMaterial)) {
        $barangsQuery->where('Type_of_Material', $filterTypeOfMaterial);
    }

    $barangs = $barangsQuery->latest()->get();
    
         // Mengambil data audit seperti yang Anda lakukan sebelumnya
         $audit = DB::table('audits')->latest()->where('sourcetable', 'List of Material')->get();
    
         return view('ListOfMaterial.index', compact('barangs', 'audit'))
             ->with('i');
     }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang=barang::latest()->where('Status', '1')->get();
        return view('ListOfMaterial.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebarangRequest $request)
    {
        $this->validate($request, [
            /* 'Material_Code' => ['required'], */
            'Type_of_Material' => ['required'],
            'Type_of_Budget' => ['required'],
            'Name_of_Material' => ['required'],
            'Catalog_Number' => ['required'],
            'packingsize' => ['required'],
            'packingsize_unit' => ['required'],
            'Manufaktur' => ['required'],
            'Unit' => ['required'],
            'Safety_Stock' => ['required'],
            'Harga' => ['required'],
            'Maximum_Stock' => ['required'],
        ], ['packingsize_unit.required' => ['packing size unit field is required']]);

        $materialcode=Materialcode::where('Type_of_Material',$request->Type_of_Material)->first();
        $lastid = barang::where('Material_Code', 'like', $materialcode->Material_Code.'%')->max('Material_Code');        
        $lastno = intval(substr($lastid, -3));
        $newcode = $materialcode->Material_Code.sprintf('%03s', ($lastno == 0 or $lastno == null) ? 1 : abs($lastno + 1));
        
        $barang = new barang();

        $barang->Material_Code = $request->Material_Code ? $request->Material_Code : $newcode;
        $barang->Type_of_Material = $request->Type_of_Material;
        $barang->Type_of_Budget = $request->Type_of_Budget;
        $barang->Name_of_Material = $request->Name_of_Material;
        $barang->Catalog_Number = $request->Catalog_Number;
        $barang->packingsize = $request->packingsize;
        $barang->packingsize_unit = $request->packingsize_unit;
        $barang->Manufaktur = $request->Manufaktur;
        $barang->Quantity = 0;
        $barang->Unit = $request->Unit;
        $barang->Safety_Stock = $request->Safety_Stock;
        $barang->Harga = $request->Harga;
        $barang->Maximum_Stock = $request->Maximum_Stock;

        $barang->save();
        session()->flash('success', 'Material data successfully added.');

        return redirect()->route('Barang.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $barang = barang::find($id);
        $incomes = Income::latest()->where('Catalog_Number', $barang->Catalog_Number)
            ->where('Status', 1)
            ->where('tipe_transaksi', 1)
            ->where('Quantity', '>', '0')
            ->get();
        $usage = Usage::latest()->where('Catalog_Number', $barang->Catalog_Number)
            ->where('tipe_transaksi', 1)
            ->get();
        $audit = DB::table('audits')
            ->latest()
            ->where(function ($query) use ($barang) {
                $query->where('sourcetable', 'List of Material')
                    ->orWhere('sourcetable', 'Incoming Material')
                    ->orWhere('sourcetable', 'Material Usage');
            })
            ->where('recordid', $barang->Catalog_Number)
            ->get();
       
        $incomess = Income::latest()->where('Quantity', '0')
            ->where('Catalog_Number', $barang->Catalog_Number)
            ->where('Status', '1')
            ->where('tipe_transaksi', '1')->get();


        return view('ListOfMaterial.show', compact('barang', 'audit', 'incomes', 'usage', 'incomess',))
            ->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = barang::find($id);

        return view('ListOfMaterial.edit', [
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebarangRequest $request, barang $barang, $id)
    {
        $this->validate($request, [
            'Material_Code' => ['required'],
            'Type_of_Material' => ['required'],
            'Type_of_Budget' => ['required'],
            'Name_of_Material' => ['required'],
            'Catalog_Number' => ['required'],
            'packingsize' => ['required'],
            'packingsize_unit' => ['required'],
            'Manufaktur' => ['required'],
            'Unit' => ['required'],
            'Safety_Stock' => ['required'],
            'Harga' => ['required'],
            'Maximum_Stock' => ['required'],
        ], ['Packingsize Unit.required' => 'Packing size Unit field is required']);
        $barang = barang::find($id);

        $barang->Material_Code = $request->Material_Code;
        $barang->Type_of_Material = $request->Type_of_Material;
        $barang->Type_of_Budget = $request->Type_of_Budget;
        $barang->Name_of_Material = $request->Name_of_Material;
        $barang->Catalog_Number = $request->Catalog_Number;
        $barang->packingsize = $request->packingsize;
        $barang->packingsize_unit = $request->packingsize_unit;
        $barang->Manufaktur = $request->Manufaktur;
        $barang->Quantity = $request->Quantity;
        $barang->Harga = $request->Harga;
        $barang->Unit = $request->Unit;
        $barang->Safety_Stock = $request->Safety_Stock;
        $barang->Maximum_Stock = $request->Maximum_Stock;

        $barang->save();
        session()->flash('info', 'Material data Successfully edited.');
        return redirect()->route('Barang.index');
    }



    public function tidakaktif()
    {
        $barangs = barang::latest()->where('Status', '0')->get();

        return view('ListOfMaterial.notaktif', compact('barangs'))
            ->with('i');
    }

    //$incomes = Income::latest()->where('Status', '0')




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang $barang, $id)
    {
        $barang = barang::find($id);
        $barang->delete();
        session()->flash('danger', 'Barang Berhasil di Hapus.');
        return redirect()->route('Barang.index');
    }

    public function statusaktif(barang $barang, $id)
    {
        $barang = barang::find($id);
        $barang->update(['Status' => 1]);

        \auditmms(auth()->user()->name, 'Activate Material', $barang->Catalog_Number, 'List of Material', 'Status', 'Inactive', 'Active');
        session()->flash('info', 'Stock Material has been Active.');
        return redirect()->route('Barang.index');
    }

    public function statusnonaktif(barang $barang, $id)
    {
        $barang = barang::find($id);
        $barang->update(['Status' => 0]);
        \auditmms(auth()->user()->name, 'Deactivate Material', $barang->Catalog_Number, 'List of Material', 'Status', 'Active', 'Inactive');
        session()->flash('info', 'Stock Material has been Inactive.');
        return redirect()->route('Barang.index');
    }


    public function opname()
    {
        $incomes = Income::where('tipe_transaksi', '2')->sum('Quantity')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::today()->endOfMonth()]);
        $barang = barang::where('Status', '1')->sum('Quantity');
        $usages = Usage::where('tipe_transaksi', '3')->sum('Quantity')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::today()->endOfMonth()]);
        $semuaperubahan = [
            'income' => $incomes,
            'usage' => $usages
        ];
        $jumlah = $incomes + $usages;
        $accuracy = $barang - $jumlah / $barang * 100;
        Opname::create([
            'created_at' => Carbon::now()->startOfMonth(),
            'end_at' => Carbon::now()->endOfMonth(),
            'type' => 'auto',
            'accuracy' => $accuracy,
            'data' => $semuaperubahan
        ]);

        session()->flash('info', 'opname telah dibikin');
        return redirect()->route('Barang.index');
    }

    public function deadstok($id)
    {
        $barang = barang::find($id);
        $incomess = Income::latest()->where('Quantity', '0')
            ->where('Catalog_Number', $barang->Catalog_Number)
            ->where('Status', '1')
            ->where('tipe_transaksi', '1')->get();
        dd($incomess);
        return view('ListOfMaterial.listdead', compact('incomess'))
            ->with('i');
    }

    public function import(Request $request)
    {
        $pathToCsv = storage_path('/app/public/test2.xlsx');
        
        $rows = SimpleExcelReader::create($pathToCsv)
    ->useHeaders(['test_data', 'test_data2'])
    ->getRows()
    ->each(function(array $rowProperties) {
       // in the first pass $rowProperties will contain
       // ['email_address' => 'john@example', 'given_name' => 'john']
});
        dd($rows);

        $rows->each(function (array $rowProperties) {
            $data[] = $rowProperties;
        });

        dd($request->file('file'));
    }
}
