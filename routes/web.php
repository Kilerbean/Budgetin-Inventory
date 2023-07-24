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

// route::resource('barang',BarangController::class);
//Route Dashboard
Route::middleware('auth')->group(function() {
    Route::get('/dashboards', [QcDashboardController::class,'dashboard']) ->name('Dashboards');

Route::get('/Tambahmaterial', [QcDashboardController::class,'create']) ->name('tambah');



// Route::get('/Tambahmaterial/{baranglows}', [QcDashboardController::class,'store']) ->name('tambahmaterial');
Route::get('/maintenance', [QcDashboardController::class,'maintenance']) ->name('Maintenance')->middleware('user.level:2,3,4,5');
Route::get('/PRad', [QcDashboardController::class,'PRad']) ->name('Product')->middleware('user.level:2,3,4,5,6');
Route::get('/Supporting', [QcDashboardController::class,'Supporting']) ->name('Supporting')->middleware('user.level:2,3,4,5');
Route::get('/Manufacturing', [QcDashboardController::class,'Manufacturing']) ->name('Manufacturing')->middleware('user.level:2,3,4,5');
Route::get('/laporanincome',[QcDashboardController::class,'laporanincome'])->name('laporanincome')->middleware('user.level:3,4,5');
Route::get('/laporanusage',[QcDashboardController::class,'laporanusage'])->name('laporanusage')->middleware('user.level:3,4,5');

//route Material
Route::get('/barang',[BarangController::class,'index'])-> name('Barang.index')->middleware('auth','user.level:2,3,4,5');
Route::get('/barang/create',[Barangcontroller::class,'create'])-> name('Barang.Create')->middleware('auth','user.level:2,3,4,5');
Route::post('/barang',[Barangcontroller::class,'store'])-> name('Barang.store')->middleware('auth','user.level:2,3,4,5');
Route::get('/barang/{id}/edit',[Barangcontroller::class,'edit'])-> name('Barang.edit')->middleware('auth','user.level:2,3,4,5');
Route::put('/barang/{id}',[Barangcontroller::class,'update'])-> name('Barang.update')->middleware('auth','user.level:2,3,4,5');
Route::delete('/barang/{id}',[Barangcontroller::class,'destroy'])-> name('Barang.destroy')->middleware('auth','user.level:2,3,4,5');


//Route Incoming Material
Route::resource('income',IncomeController::class)->middleware('user.level:2,3,4,5');
Route::put('/income/{income}/updateterima',[IncomeController::class,'updatediterima'])->name('Income.Diterima')->middleware('user.level:2,3,4,5');

//Route Material Usage
Route::resource('usage',UsageController::class)->middleware('auth')->middleware('user.level:2,3,4,5');
Route::put('/usage/{usage}/updategunakan',[UsageController::class,'updategunakan'])->name('Usage.Digunakan')->middleware('user.level:2,3,4,5');


//route Financial
Route::resource('financial',FinancialController::class)->middleware('user.level:3,4,5');


//Route karyawan
Route::get('/karyawan', [UserController::class,'index']) ->name('karyawan')->middleware('user.level:2,3,4,5');
Route::get('/karyawan/{user}/edit', [UserController::class,'edit']) ->name('karyawan.edit')->middleware('user.level:3,4,5');
Route::get('/karyawan/{user}/updatestaff', [UserController::class,'updatestaff']) ->name('karyawan.edit.staff')->middleware('user.level:3,4,5');
Route::get('/karyawan/{user}/updatespv', [UserController::class,'updatespv']) ->name('karyawan.edit.spv')->middleware('user.level:3,4,5');
Route::get('/karyawan/{user}/updatemanager', [UserController::class,'updatemanager']) ->name('karyawan.edit.manager')->middleware('user.level:4,5');
Route::get('/karyawan/{user}/updateadmin', [UserController::class,'updateadmin']) ->name('karyawan.edit.admin')->middleware('user.level:4,5');
Route::get('/karyawan/profil', [UserController::class,'profil']) ->name('profil');

});

require __DIR__.'/auth.php';
