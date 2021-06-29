<?php
use App\Http\Controllers\EstadoFacturaController;

Route::get('estadofacturas', [EstadoFacturaController::class,'index'])->name('estadofacturas.index')->middleware('sesion.iniciada');
Route::get('estadofacturas/agregar', [EstadoFacturaController::class,'agregar'])->name('estadofacturas.agregar')->middleware('sesion.iniciada');
Route::get('estadofacturas/{id}', [EstadoFacturaController::class,'mostrar'])->name('estadofacturas.mostrar')->middleware('sesion.iniciada');
Route::post('estadofacturas', [EstadoFacturaController::class,'insertar'])->name('estadofacturas.insertar')->middleware('sesion.iniciada');
Route::get('estadofacturas/{id}/modificar', [EstadoFacturaController::class,'modificar'])->name('estadofacturas.modificar')->middleware('sesion.iniciada');
Route::put('estadofacturas/{estadofactura}', [EstadoFacturaController::class,'actualizar'])->name('estadofacturas.actualizar')->middleware('sesion.iniciada');
Route::delete('estadofacturas/{estadofactura}', [EstadoFacturaController::class,'eliminar'])->name('estadofacturas.eliminar')->middleware('sesion.iniciada');
