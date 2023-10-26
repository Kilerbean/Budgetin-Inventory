<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\QcDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KalibrasiController;
use App\Http\Controllers\WorkorderlistController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('dashboard');
    });
});
Route::get('/dasar',function () {
    return view('templates.dasar');
});


//Route Dashboard QC EXPENSE
Route::middleware('auth')->group(function() {
    Route::get('/dashboards', [QcDashboardController::class,'dashboard']) ->name('Dashboards')->middleware('user.level:2,3,4,5');


Route::post('/Tambah', [QcDashboardController::class,'store']) ->name('tambahmaterial')->middleware('user.level:2,3,4,5');
Route::get('/tambah/{baranglow}/material', [QcDashboardController::class,'tambah']) ->name('tambah')->middleware('user.level:2,3,4,5');

Route::get('/maintenance', [QcDashboardController::class,'maintenance']) ->name('Maintenance')->middleware('user.level:2,3,4,5');
Route::get('/PRad', [QcDashboardController::class,'PRad']) ->name('Product')->middleware('user.level:2,3,4,5');
Route::get('/Supporting', [QcDashboardController::class,'Supporting']) ->name('Supporting')->middleware('user.level:2,3,4,5');
Route::get('/Manufacturing', [QcDashboardController::class,'Manufacturing']) ->name('Manufacturing')->middleware('user.level:2,3,4,5');
Route::get('/laporanincome',[QcDashboardController::class,'laporanincome'])->name('laporanincome')->middleware('user.level:3,4,5');
Route::get('/laporanusage',[QcDashboardController::class,'laporanusage'])->name('laporanusage')->middleware('user.level:3,4,5');
Route::get('/laporanincome/pdf',[QcDashboardController::class,'laporanincomepdf'])->name('laporanincomepdf')->middleware('user.level:3,4,5');
Route::get('/laporanusage/pdf',[QcDashboardController::class,'laporanusagepdf'])->name('laporanusagepdf')->middleware('user.level:3,4,5');
Route::get('/filter', [QcDashboardController::class,'filter'])->middleware('user.level:2,3,4,5');


//route all List of Material
Route::get('/barang',[BarangController::class,'index'])-> name('Barang.index')->middleware('user.level:2,3,4,5');
Route::get('/barang/create',[Barangcontroller::class,'create'])-> name('Barang.Create')->middleware('user.level:2,3,4,5');
Route::post('/barang/store',[Barangcontroller::class,'store'])-> name('Barang.store')->middleware('user.level:2,3,4,5');
Route::get('/barang/{id}/edit',[Barangcontroller::class,'edit'])-> name('Barang.edit')->middleware('user.level:4,5');
Route::get('/barang/{id}/detail',[Barangcontroller::class,'show'])-> name('Barang.show')->middleware('user.level:2,3,4,5');
Route::put('/barang/{id}',[Barangcontroller::class,'update'])-> name('Barang.update')->middleware('user.level:2,3,4,5');
Route::delete('/barang/{id}',[Barangcontroller::class,'destroy'])-> name('Barang.destroy')->middleware('user.level:2,3,4,5');

Route::get('/barang/{id}/deadstok',[Barangcontroller::class,'deadstok'])-> name('Barang.deadstok')->middleware('user.level:2,3,4,5');

Route::get('/barang/{id}/statusnonaktif',[Barangcontroller::class,'statusnonaktif'])-> name('nonaktif')->middleware('user.level:4,5');
Route::get('/barang/{id}/statusaktif',[Barangcontroller::class,'statusaktif'])-> name('aktif')->middleware('user.level:4,5');
Route::get('/barang/tidakaktif',[BarangController::class,'tidakaktif'])-> name('barangtidakaktif')->middleware('user.level:4,5');
Route::post('/barangs/import',[BarangController::class,'import'])->name('import');
Route::get('/barang/listcode',[BarangController::class,'listcode'])->name('Barang.listcode')->middleware('user.level:1,2,3,4,5');


//Route Incoming Material
// Route::resource('income',IncomeController::class)->middleware('user.level:2,3,4,5');
Route::get('/income',[IncomeController::class,'index'])-> name('income.index')->middleware('user.level:2,3,4,5');
Route::get('/income/create',[Incomecontroller::class,'create'])-> name('income.create')->middleware('user.level:2,3,4,5');
Route::post('/income/store',[Incomecontroller::class,'store'])-> name('income.store')->middleware('user.level:2,3,4,5');
Route::get('/income/{income}/edit',[Incomecontroller::class,'edit'])-> name('income.edit')->middleware('user.level:2,3,4,5');
// Route::get('/income/{income}/detail',[Incomecontroller::class,'show'])-> name('income.show')->middleware('user.level:2,3,4,5');
Route::put('/income/{income}',[Incomecontroller::class,'update'])-> name('income.update')->middleware('user.level:2,3,4,5');
Route::delete('/income/{income}',[Incomecontroller::class,'destroy'])-> name('income.destroy')->middleware('user.level:4,5');


Route::put('/income/{income}/updateterima',[IncomeController::class,'updatediterima'])->name('Income.Diterima')->middleware('user.level:2,3,4,5');
Route::put('/income/{income}/kosongkan',[IncomeController::class,'kosongkan'])->name('Income.dikosongkan')->middleware('user.level:2,3,4,5');
Route::get('/incomes/deadstock',[IncomeController::class,'deadstock'])->name('Income.deadstock')->middleware('user.level:2,3,4,5');
Route::get('/income/{income}/quantity',[IncomeController::class,'quantity'])-> name('quantity')->middleware('user.level:2,3,4,5');
Route::put('/income/{income}/editquantity',[IncomeController::class,'editquantity'])-> name('edit.quantity')->middleware('user.level:2,3,4,5');
Route::put('/income/{income}/inputpo',[IncomeController::class,'inputpo'])->name('Income.inputpo')->middleware('user.level:2,3,4,5');


//Route Material Usage
Route::resource('usage',UsageController::class)->middleware('auth')->middleware('user.level:2,3,4,5');
Route::put('/usage/{usage}/updategunakan',[UsageController::class,'updategunakan'])->name('Usage.Digunakan')->middleware('user.level:2,3,4,5');
 Route::get('/get-batches/{income}', [UsageController::class,'getBatches'])->name('get.batches');


 //route Financial
Route::resource('financial',FinancialController::class)->middleware('user.level:4,5');




//Route karyawan
Route::get('/karyawan', [UserController::class,'index']) ->name('karyawan')->middleware('user.level:2,3,4,5');
Route::put('/karyawan/{user}/update',[UserController::class,'update'])->name('karyawan.update')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/edit', [UserController::class,'edit']) ->name('karyawan.edit')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/updatestaff', [UserController::class,'updatestaff']) ->name('karyawan.edit.staff')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/updatespv', [UserController::class,'updatespv']) ->name('karyawan.edit.spv')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/updatemanager', [UserController::class,'updatemanager']) ->name('karyawan.edit.manager')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/updateadmin', [UserController::class,'updateadmin']) ->name('karyawan.edit.admin')->middleware('user.level:4,5');
Route::get('/karyawan/profil', [UserController::class,'profil']) ->name('profil');




//ROUTE CALIBRATION

Route::get('/Dashboard/Kalibrasi',[KalibrasiController::class,'dashboard'])->name('dashboard.kalibrasi')->middleware('user.level:2,3,4,5');

Route::get('/kalibrasi',[KalibrasiController::class,'index'])->name('listKalibrasi')->middleware('user.level:2,3,4,5');
route::get('/kalibrasi/create',[KalibrasiController::class,'create'])->name('listkalibrasi.create')->middleware('user.level:2,3,4,5');
route::post('/kalibrasi/store',[KalibrasiController::class,'store'])->name('listkalibrasi.store')->middleware('user.level:2,3,4,5');
route::get('/kalibrasi/{kalibrasi}/edit',[KalibrasiController::class,'edit'])->name('listKalibrasi.edit')->middleware('user.level:2,3,4,5');
route::put('/kalibrasi/{kalibrasi}',[KalibrasiController::class,'update'])->name('listKalibrasi.update')->middleware('user.level:2,3,4,5');
Route::delete('/kalibrasi/{kalibrasi}',[KalibrasiController::class,'destroy'])-> name('kalibrasi.destroy')->middleware('user.level:4,5');

//kalibrasinya tepat waktu
route::put('/calibrasi/{kalibrasi}',[KalibrasiController::class,'ontime'])->name('Kalibrasi.update.ontime')->middleware('user.level:2,3,4,5');

//kalibrasinya tidak tepat waktu
route::get('/calibrasi/{kalibrasi}',[KalibrasiController::class,'overcalibration'])->name('Kalibrasi.update.overdue')->middleware('user.level:2,3,4,5');




//route jadwal kalibrasi
Route::get('/kalibrasi/jadwal',[KalibrasiController::class,'jadwal'])->name('jadwal')->middleware('user.level:2,3,4,5');
Route::put('/kalibrasis/jadwalkanlibrasi',[KalibrasiController::class,'jadwalkalibrasi'])->name('kalibrasi.jadwalkalibrasi')->middleware('user.level:2,3,4,5');
route::put('/kalibrasis/{kalibrasi}',[KalibrasiController::class,'terjadwal'])->name('kalibrasi.terjadwal')->middleware('user.level:2,3,4,5');



//route add Vendor
Route::get('/kalibrasi/vendor',[KalibrasiController::class,'vendor'])->name('kalibrasi.vendor')->middleware('user.level:2,3,4,5');
Route::post('/kalibrasis/addvendor',[KalibrasiController::class,'addvendor'])->name('kalibrasi.addvedor')->middleware('user.level:2,3,4,5');







//rote breakdown 
Route::get('/kalibrasi/{kalibrasi}/breakdown',[KalibrasiController::class,'breakdown'])->name('kalibrasi.breakdown')->middleware('user.level:2,3,4,5');
Route::put('/kalibrasi/breakdown/{kalibrasi}',[KalibrasiController::class,'breakdownedit'])->name('kalibrasi.breakdown.edit')->middleware('user.level:2,3,4,5');


Route::get('/kalibrasi/addbreakdown',[KalibrasiController::class,'addbreakdown'])->name('kalibrasi.addbreakdown')->middleware('user.level:2,3,4,5');
Route::put('/kalibrasis/addbreakdowns',[KalibrasiController::class,'addbreakdownedit'])->name('kalibrasi.addbreakdown.edit')->middleware('user.level:2,3,4,5');


//route Work Order List
Route::get('/kalibrasi/workorderlist',[WorkorderlistController::class,'index'])->name('index.workorderlist')->middleware('user.level:2,3,4,5');
Route::get('/kalibrasi/workorderlist/{kalibrasi}/edit',[WorkorderlistController::class,'edit'])->name('workorderlist.edit')->middleware('user.level:2,3,4,5');
Route::put('/kalibrasi/workorderlist/{kalibrasi}/update',[WorkorderlistController::class,'update'])->name('workorderlist.update')->middleware('user.level:2,3,4,5');






});

require __DIR__.'/auth.php';
