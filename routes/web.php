<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AtkItemController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\admin\ManagementUserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UnitController;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/atkItems', [AtkItemController::class, 'index'])->name('atkItems.index');
    Route::get('/atkItems/create', [AtkItemController::class, 'create'])->name('atkItems.create');
    Route::get('/atkItems/habis', [AtkItemController::class, 'habis'])->name('atkItems.habis');
    Route::get('/atkItems/export-pdf', [AtkItemController::class, 'exportPdf'])->name('atkItems.exportPdf');
    Route::post('/atkItems/store', [AtkItemController::class, 'store'])->name('atkItems.store');
    // Route::post('/atkItems/store', [AtkItemController::class, 'store'])->name('atkItems.store');
    Route::get('/atkItems/{id}/edit', [AtkItemController::class, 'edit'])->name('atkItems.edit');
    Route::patch('/atkItems/{id}', [AtkItemController::class, 'update'])->name('atkItems.update');
    // Route::post('/atkItems', [AtkItemController::class, 'index'])->name('atk-items.index');

    Route::get('/barangKeluar', [BarangKeluarController::class, 'index'])->name('barangKeluar.index');
    Route::get('/barangKeluar/create', [BarangKeluarController::class, 'create'])->name('barangKeluar.create');
    Route::post('/barangKeluar/store', [BarangKeluarController::class, 'store'])->name('barangKeluar.store');

    Route::get('/barangMasuk', [BarangMasukController::class, 'index'])->name('barangMasuk.index');
    Route::get('/barangMasuk/create', [BarangMasukController::class, 'create'])->name('barangMasuk.create');
    Route::post('/barangMasuk/store', [BarangMasukController::class, 'store'])->name('barangMasuk.store');

    // Route::get('/barangKosong', [AtkItemController::class, 'index'])->name('barangKosong.index');

    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/requests/create', [RequestController::class, 'store'])->name('requests.store');
    Route::patch('/requests/{id}/done', [RequestController::class, 'updateStatus'])->name('requests.updateStatus');

    // Route::get('/users', [ManagementUserController::class, 'index'])->name('users.index'); 
    Route::get('/units', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/units/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/units/store', [UnitController::class, 'store'])->name('unit.store');
});

require __DIR__ . '/auth.php';
