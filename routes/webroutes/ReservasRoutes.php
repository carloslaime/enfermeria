<?php
use App\Http\Controllers\ReservaController;

Route::get('reservas', [ReservaController::class,'index'])->name('reservas.index')->middleware('sesion.iniciada');
Route::get('reservas/agregar', [ReservaController::class,'agregar'])->name('reservas.agregar')->middleware('sesion.iniciada');
Route::get('reservas/{id}', [ReservaController::class,'mostrar'])->name('reservas.mostrar')->middleware('sesion.iniciada');
Route::post('reservas', [ReservaController::class,'insertar'])->name('reservas.insertar')->middleware('sesion.iniciada');
Route::get('reservas/{id}/modificar', [ReservaController::class,'modificar'])->name('reservas.modificar')->middleware('sesion.iniciada');
Route::put('reservas/{reserva}', [ReservaController::class,'actualizar'])->name('reservas.actualizar')->middleware('sesion.iniciada');
Route::delete('reservas/{reserva}', [ReservaController::class,'eliminar'])->name('reservas.eliminar')->middleware('sesion.iniciada');
Route::get('enfermeras/personas-activas/buscar', [ReservaController::class,'personasActivas'])->name('reservas.personasActivas')->middleware('sesion.iniciada');