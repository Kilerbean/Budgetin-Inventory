<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\QcDashboardController;
use App\Http\Controllers\UserController;
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


//Route Dashboard QC COST
Route::middleware('auth')->group(function() {
    Route::get('/dashboards', [QcDashboardController::class,'dashboard']) ->name('Dashboards')->middleware('user.level:1,2,3,4,5');


Route::post('/Tambah', [QcDashboardController::class,'store']) ->name('tambahmaterial')->middleware('user.level:1,2,3,4,5');
Route::get('/tambah/{baranglow}/material', [QcDashboardController::class,'tambah']) ->name('tambah')->middleware('user.level:1,2,3,4,5');

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
Route::get('/income/{income}/edit',[Incomecontroller::class,'edit'])-> name('income.edit')->middleware('user.level:4,5');
// Route::get('/income/{income}/detail',[Incomecontroller::class,'show'])-> name('income.show')->middleware('user.level:2,3,4,5');
Route::put('/income/{income}',[Incomecontroller::class,'update'])-> name('income.update')->middleware('user.level:2,3,4,5');
Route::delete('/income/{income}',[Incomecontroller::class,'destroy'])-> name('income.destroy')->middleware('user.level:2,3,4,5');


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





//Route QC CS


});

require __DIR__.'/auth.php';
