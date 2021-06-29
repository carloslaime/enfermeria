<?php
use App\Http\Controllers\EstadoController;

Route::get('estados', [EstadoController::class,'index'])->name('estados.index')->middleware('sesion.iniciada');
Route::get('estados/agregar', [EstadoController::class,'agregar'])->name('estados.agregar')->middleware('sesion.iniciada');
Route::get('estados/{id}', [EstadoController::class,'mostrar'])->name('estados.mostrar')->middleware('sesion.iniciada');
Route::post('estados', [EstadoController::class,'insertar'])->name('estados.insertar')->middleware('sesion.iniciada');
Route::get('estados/{id}/modificar', [EstadoController::class,'modificar'])->name('estados.modificar')->middleware('sesion.iniciada');
Route::put('estados/{estado}', [EstadoController::class,'actualizar'])->name('estados.actualizar')->middleware('sesion.iniciada');
Route::delete('estados/{estado}', [EstadoController::class,'eliminar'])->name('estados.eliminar')->middleware('sesion.iniciada');
