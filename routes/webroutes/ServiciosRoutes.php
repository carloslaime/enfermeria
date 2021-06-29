<?php
use App\Http\Controllers\ServicioController;

Route::get('servicios', [ServicioController::class,'index'])->name('servicios.index')->middleware('sesion.iniciada');
Route::get('servicios/agregar', [ServicioController::class,'agregar'])->name('servicios.agregar')->middleware('sesion.iniciada');
Route::get('servicios/{id}', [ServicioController::class,'mostrar'])->name('servicios.mostrar')->middleware('sesion.iniciada');
Route::post('servicios', [ServicioController::class,'insertar'])->name('servicios.insertar')->middleware('sesion.iniciada');
Route::get('servicios/{id}/modificar', [ServicioController::class,'modificar'])->name('servicios.modificar')->middleware('sesion.iniciada');
Route::put('servicios/{servicio}', [ServicioController::class,'actualizar'])->name('servicios.actualizar')->middleware('sesion.iniciada');
Route::delete('servicios/{servicio}', [ServicioController::class,'eliminar'])->name('servicios.eliminar')->middleware('sesion.iniciada');
