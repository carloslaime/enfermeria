<?php
use App\Http\Controllers\InsumoController;

Route::get('insumos', [InsumoController::class,'index'])->name('insumos.index')->middleware('sesion.iniciada');
Route::get('insumos/agregar', [InsumoController::class,'agregar'])->name('insumos.agregar')->middleware('sesion.iniciada');
Route::get('insumos/{id}', [InsumoController::class,'mostrar'])->name('insumos.mostrar')->middleware('sesion.iniciada');
Route::post('insumos', [InsumoController::class,'insertar'])->name('insumos.insertar')->middleware('sesion.iniciada');
Route::get('insumos/{id}/modificar', [InsumoController::class,'modificar'])->name('insumos.modificar')->middleware('sesion.iniciada');
Route::put('insumos/{insumo}', [InsumoController::class,'actualizar'])->name('insumos.actualizar')->middleware('sesion.iniciada');
Route::delete('insumos/{insumo}', [InsumoController::class,'eliminar'])->name('insumos.eliminar')->middleware('sesion.iniciada');
