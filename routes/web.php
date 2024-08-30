<?php

use App\Models\sparepart;
use App\Http\Controllers\SparepartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SparepartController::class, 'index'])->name('pc.index');

Route::delete('users/{id}', [SparepartController::class, 'delete'])->name('pc.delete');

Route::get('create', [SparepartController::class, 'create'])->name('pc.create');

Route::post('store', [SparepartController::class, 'store'])->name('pc.store');

Route::get('/edit/{id}', [SparepartController::class, 'edit'])->name('pc.edit');

Route::put('/update/{id}', [SparepartController::class, 'update'])->name('pc.update');