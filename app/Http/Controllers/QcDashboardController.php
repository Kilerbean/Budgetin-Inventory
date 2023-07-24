<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\financial;
use App\Models\Income;
use App\Models\Usage;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QcDashboardController extends Controller
{
    
    public function dashboard()
    {
        $user =AuthUser::get();
        $incomes = Income::latest()->where('Status', '0')->get();
        // $barang= barang::all();

        $barangexpire=barang::where('Expire_Date','<',now()->addDays(7))->get();

        $baranglows= barang::whereColumn('Quantity','<=','Safety_Stock')->get();



        $totalactual1 = DB::table('financials')
                        ->where('Type_of_Budget', 'maintenance')
                        ->sum('actual');


        $totalbudget1 = DB::table('financials')
                        ->where('Type_of_Budget', 'maintenance')
                        ->sum('budget');


                        if ($totalbudget1 < $totalactual1) {
                            $colorClass1 = 'text-danger'; // warna merah
                        } else {
                            $colorClass1 = 'text-success'; // warna hijau
                        }

        $totalactual2 = DB::table('financials')
                        ->where('Type_of_Budget', 'Product Research and Development')
                        ->sum('actual');


        $totalbudget2 = DB::table('financials')
                        ->where('Type_of_Budget', 'Product Research and Development')
                        ->sum('budget');

                        if ($totalbudget2 < $totalactual2) {
                            $colorClass2 = 'text-danger'; // warna merah
                        } else {
                            $colorClass2 = 'text-success'; // warna hijau
                        }

        $totalactual3 = DB::table('financials')
                        ->where('Type_of_Budget', 'Supporting Material')
                        ->sum('actual');


        $totalbudget3 = DB::table('financials')
                        ->where('Type_of_Budget', 'Supporting Material')
                        ->sum('budget');
                        if ($totalbudget3 < $totalactual3) {
                            $colorClass3 = 'text-danger'; // warna merah
                        } else {
                            $colorClass3 = 'text-success'; // warna hijau
                        }


        $totalactual4 = DB::table('financials')
                        ->where('Type_of_Budget', 'Manufacturing Supply')
                        ->sum('actual');
                       
                       

        $totalbudget4 = DB::table('financials')
                        ->where('Type_of_Budget', 'Manufacturing Supply')
                        ->sum('budget');

                        if ($totalbudget4 < $totalactual4) {
                            $colorClass4 = 'text-danger'; // warna merah
                        } else {
                            $colorClass4 = 'text-success'; // warna hijau
                        }


        return view('COST_QC.QC_Dashboard',compact('totalactual1','totalbudget1',
        'totalactual2','totalbudget2','totalactual3','totalbudget3','totalactual4','totalbudget4','colorClass1',
        'colorClass2','colorClass3','colorClass4','incomes','baranglows','barangexpire','user'
    ));

    }
    public function maintenance()
    {
        $financial = financial::where('Type_of_Budget', 'maintenance')->get();


        return view('COST_QC\financialdetail\maintenace',compact('financial'));
    
    }

    public function PRaD()
    {
        $financial = financial::where('Type_of_Budget', 'Product Research and Development')->get();


        return view('COST_QC\financialdetail\PRaD',compact('financial'));
    
    }

    public function Supporting()
    {
        $financial = financial::where('Type_of_Budget', 'Supporting Material')->get();


        return view('COST_QC\financialdetail\supporting_material',compact('financial'));
    
    }


    public function Manufacturing()
    {
        $financial = financial::where('Type_of_Budget', 'Manufacturing Supply')->get();


        return view('COST_QC\financialdetail\manufacturing_supply',compact('financial'));
    
    }


    public function create(Income $income)
    {
        $barang= barang::all();
      
        return view('COST_QC.listmaterial.listmateriallow_tambah', compact('income','barang'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
   
    //     $request->validate([
    //         'No_PR' => 'required',
    //         'Catalog_Number' => 'required',
    //         'Quantity' => 'required',
    //         'Propose' => 'required',
    //         'No_PO' => 'required',
    //         'PO_Date' => 'required',
    //         'Expire_Date' => 'required',
            
    //     ]);
    //     $barang = barang::where('Catalog_Number',$request ->Catalog_Number)->first();
    //     $Total=$request ->Quantity * $barang ->Harga;
    //     $income = new Income();
   
    //     $income ->No_PR =$request ->No_PR ;
    //     $income ->Catalog_Number =$request ->Catalog_Number ;
    //     $income ->Type_of_Material =$barang ->Type_of_Material ;
    //     $income ->Name_of_Material =$barang ->Name_of_Material ;
    //     $income ->Quantity =$request ->Quantity ;
    //     $income ->Unit =$barang ->Unit ;
    //     $income ->Prices =$barang ->Harga ;
    //     $income ->Total =$Total;
    //     $income ->Propose =$request ->Propose ;
    //     $income ->No_PO =$request ->No_PO ;
    //     $income ->PO_Date =$request ->PO_Date ;
    //     $income ->Expire_Date =$request ->Expire_Date;
    

    //     $income -> save();
        
    //     // Income::create($request->all());
       

    //     return redirect()->route('Dashboards')
    //                      ->with('success','Material Data created successfully.');
    // }

public function laporanincome(){
    $incomes = Income::latest()->where('Status', '1')->get();
    // $incomes->status = true; // Mengubah nilai menjadi Diterima
    return view('COST_QC.laporanmaterial.laporanincome',compact('incomes',))
    ->with('i');

}

public function laporanusage(){
    $usage=Usage::latest()->where('Status', '1')->get();
    return view('COST_QC.laporanmaterial.laporanusage',compact('usage'))
    ->with('i', (request()->input('page', 1) - 1) * 8);

}




}
