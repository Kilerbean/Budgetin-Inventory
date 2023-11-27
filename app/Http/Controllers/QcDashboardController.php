<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Usage;
use App\Models\barang;
use App\Models\Income;
use App\Models\Opname;

use App\Models\financial;
use App\Models\Materialcode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as AuthUser;

class QcDashboardController extends Controller
{

    public function dashboard(Request $request)
    {



        $user = AuthUser::get();
        $incomes = Income::latest()->where('Status', '0')->whereNotNull('No_PO')->get();
        // $barang= barang::all();

        $barangexpire = Income::latest()->where('Expire_Date', '<', now()->addDays(60))
            ->where('tipe_transaksi', '1')
            ->where('Quantity', '>', 0)
            ->where('Status', '1')
            ->get();

        // $baranglows = barang::latest()->whereColumn('Quantity', '<=', 'Safety_Stock')->get();
        $baranglows = DB::table('barangs')
            ->select('Material_Code', 'Quantity', 'Safety_Stock', 'id', 'Type_of_Material', 'Type_of_Budget', 'Name_of_Material', 'Catalog_Number', 'packingsize', 'packingsize_unit', 'Unit', 'Maximum_Stock', 'Manufaktur', 'Harga', 'Status', 'Expire_Date', 'created_at', 'updated_at', 'category')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('barangs')
                    ->groupBy('Material_Code')
                    ->where('Status', '1')
                    ->havingRaw('SUM(Quantity) <= AVG(Safety_Stock)');
            })->get();

        $totalQuantity = Barang::getTotalQuantity();

        $currentYear = Carbon::now()->format('y');

        $totalactual1 = DB::table('financials')
            ->where('Type_of_Budget', 'maintenance')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('actual');


        $totalbudget1 = DB::table('financials')
            ->where('Type_of_Budget', 'maintenance')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('budget');


        if ($totalbudget1 < $totalactual1) {
            $colorClass1 = 'text-danger'; // warna merah
        } else {
            $colorClass1 = 'text-success'; // warna hijau
        }

        $totalactual2 = DB::table('financials')
            ->where('Type_of_Budget', 'Product Research and Development')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('actual');


        $totalbudget2 = DB::table('financials')
            ->where('Type_of_Budget', 'Product Research and Development')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('budget');

        if ($totalbudget2 < $totalactual2) {
            $colorClass2 = 'text-danger'; // warna merah
        } else {
            $colorClass2 = 'text-success'; // warna hijau
        }

        $totalactual3 = DB::table('financials')
            ->where('Type_of_Budget', 'Supporting Material')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('actual');


        $totalbudget3 = DB::table('financials')
            ->where('Type_of_Budget', 'Supporting Material')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('budget');
        if ($totalbudget3 < $totalactual3) {
            $colorClass3 = 'text-danger'; // warna merah
        } else {
            $colorClass3 = 'text-success'; // warna hijau
        }


        $totalactual4 = DB::table('financials')
            ->where('Type_of_Budget', 'Manufacturing Supply')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('actual');



        $totalbudget4 = DB::table('financials')
            ->where('Type_of_Budget', 'Manufacturing Supply')
            ->where('bulan_tahun', 'LIKE', "%-$currentYear")
            ->sum('budget');

        if ($totalbudget4 < $totalactual4) {
            $colorClass4 = 'text-danger'; // warna merah
        } else {
            $colorClass4 = 'text-success'; // warna hijau
        }

        $start_date = $request->input('start_date', null);
        $end_date = $request->input('end_date', null);

        if ($request->has('start_date') && $request->has('end_date')) {
            session(['start_date' => $request->start_date, 'end_date' => $request->end_date]);
        }

        $start_date = session('start_date', null); // Mengambil dari session atau default null
        $end_date = session('end_date', null);     // Mengambil dari session atau default null

        $opnameQuery = Opname::query();

        if ($start_date && $end_date) {
            $opnameQuery->whereBetween('created_at', [$start_date, $end_date]);
        }

        $opname = $opnameQuery->get();


        return view('COST_QC.QC_Dashboard', compact(
            'totalactual1',
            'totalbudget1',
            'totalactual2',
            'totalbudget2',
            'totalactual3',
            'totalbudget3',
            'totalactual4',
            'totalbudget4',
            'colorClass1',
            'colorClass2',
            'colorClass3',
            'colorClass4',
            'incomes',
            'baranglows',
            'barangexpire',
            'user',
            'opname',
            'totalQuantity',
        ));
    }


    public function maintenance(Request $request)
    {

        // Dapatkan dua digit terakhir dari tahun saat ini
        $currentYear = Carbon::now()->format('y');

      
        $filterYear = $request->input('bulan_tahun') ?? $currentYear;

        $formattedFilterYear = "%-$filterYear";

        // Query database dengan filter tahun
        $financial = Financial::where('Type_of_Budget', 'maintenance')
            ->where('bulan_tahun', 'LIKE', $formattedFilterYear)
            ->get();

        // Query untuk data audit
        $audit = DB::table('audits')->latest()->where('sourcetable', 'financial')->get();

        return view('COST_QC.financialdetail.maintenace', compact('financial', 'audit', 'filterYear'));
    }



    public function PRaD(Request $request)
    {
        $currentYear = Carbon::now()->format('y');

        $filterYear = $request->input('bulan_tahun') ?? $currentYear;

        $formattedFilterYear = "%-$filterYear";

        $financial = financial::where('Type_of_Budget', 'Product Research and Development')
            ->where('bulan_tahun', 'LIKE', $formattedFilterYear)
            ->get();

        $audit = DB::table('audits')->latest()->where('sourcetable', 'financial')->get();

        return view('COST_QC.financialdetail.PRaD', compact('financial', 'audit', 'filterYear'));
    }

    public function Supporting(Request $request)
    {
        $currentYear = Carbon::now()->format('y');

      
        $filterYear = $request->input('bulan_tahun') ?? $currentYear;

       
        $formattedFilterYear = "%-$filterYear";

        $financial = financial::where('Type_of_Budget', 'Supporting Material')
            ->where('bulan_tahun', 'LIKE', $formattedFilterYear)
            ->get();
        $audit = DB::table('audits')->latest()->where('sourcetable', 'financial')->get();

        return view('COST_QC.financialdetail.supporting_material', compact('financial', 'audit', 'filterYear'));
    }


    public function Manufacturing(Request $request)
    {
        $currentYear = Carbon::now()->format('y');

      
        $filterYear = $request->input('bulan_tahun') ?? $currentYear;

       
        $formattedFilterYear = "%-$filterYear";

        $financial = financial::where('Type_of_Budget', 'Manufacturing Supply')
            ->where('bulan_tahun', 'LIKE', $formattedFilterYear)
            ->get();
        $audit = DB::table('audits')->latest()->where('sourcetable', 'financial')->get();

        return view('COST_QC.financialdetail.manufacturing_supply', compact('financial', 'audit', 'filterYear'));
    }


    public function tambah($baranglow)
    {
        $baranglows = barang::find($baranglow);
        $barangcatalog = barang::where('Material_Code', $baranglows->Material_Code)->get();
        return view('COST_QC.listmaterial.listmateriallow_tambah', compact('baranglows', 'barangcatalog'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'No_PR' => 'required',
            'Catalog_Number' => 'required',
            'Quantity' => 'required|numeric|min:1',
            'Propose' => 'required',
            'request_by' => 'required',

        ]);
        $baranglows = barang::where('Catalog_Number', $request->Catalog_Number)->first();
        $Total = $request->Quantity * $baranglows->Harga;
        $income = new Income();

        $income->No_PR = $request->No_PR;
        $income->Catalog_Number = $request->Catalog_Number;
        $income->Type_of_Material = $baranglows->Type_of_Material;
        $income->Name_of_Material = $baranglows->Name_of_Material;
        $income->Quantity = $request->Quantity;
        $income->Unit = $baranglows->Unit;
        $income->packingsize = $baranglows->packingsize;
        $income->packingsize_unit = $baranglows->packingsize_unit;
        $income->Prices = $baranglows->Harga;
        $income->Total = $Total;
        $income->Propose = $request->Propose;
        $income->PO_Date = now()->toDateString();
        $income->request_by = $request->request_by;
        $income->input_by = auth()->user()->name;
        $income->Expire_Date = $request->Expire_Date;


        $income->save();

        \auditmms(auth()->user()->name, 'Create new request purchasing',$request->Catalog_Number,'Incoming Material', 'N/A', 0, $request->Quantity);

        return redirect()->route('income.index')
            ->with('success', 'Material Data created successfully.');
    }

    public function laporanincome()
    {
        $incomes = Income::latest()->where('Status', '1')->where('tipe_transaksi', '4')->get();



        return view('COST_QC.laporanmaterial.laporanincome', compact('incomes',))
            ->with('i');
    }

    public function laporanincomepdf()
    {
        $data = [
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),

        ];

        $incomes = Income::where('Status', '1')->where('tipe_transaksi', '4')->get();
        $pdf = Pdf::loadView('COST_QC.laporanmaterial.laporanincomepdf', compact('incomes', 'data'));
        return $pdf->download('IncomeReport.pdf');
    }

    public function laporanusage()
    {
        $usage = Usage::latest()->where('Status', '1')->where('tipe_transaksi', '1')->get();
        return view('COST_QC.laporanmaterial.laporanusage', compact('usage'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }
    public function laporanusagepdf()
    {
        $data = [
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s'),

        ];

        $usage = Usage::where('Status', '1')->where('tipe_transaksi', '1')->get();
        $pdf = Pdf::loadView('COST_QC.laporanmaterial.laporanusagepdf', compact('usage', 'data'));
        return $pdf->download('UsageReport.pdf');
    }
}
