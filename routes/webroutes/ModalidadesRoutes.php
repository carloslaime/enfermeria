<?php
use App\Http\Controllers\ModalidadController;

Route::get('modalidades', [ModalidadController::class,'index'])->name('modalidades.index')->middleware('sesion.iniciada');
Route::get('modalidades/agregar', [ModalidadController::class,'agregar'])->name('modalidades.agregar')->middleware('sesion.iniciada');
Route::get('modalidades/{id}', [ModalidadController::class,'mostrar'])->name('modalidades.mostrar')->middleware('sesion.iniciada');
Route::post('modalidades', [ModalidadController::class,'insertar'])->name('modalidades.insertar')->middleware('sesion.iniciada');
Route::get('modalidades/{id}/modificar', [ModalidadController::class,'modificar'])->name('modalidades.modificar')->middleware('sesion.iniciada');
Route::put('modalidades/{modalidad}', [ModalidadController::class,'actualizar'])->name('modalidades.actualizar')->middleware('sesion.iniciada');
Route::delete('modalidades/{modalidad}', [ModalidadController::class,'eliminar'])->name('modalidades.eliminar')->middleware('sesion.iniciada');
