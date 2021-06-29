<?php
use App\Http\Controllers\DomicilioController;

Route::get('domicilios', [DomicilioController::class,'index'])->name('domicilios.index')->middleware('sesion.iniciada');
Route::get('domicilios/agregar', [DomicilioController::class,'agregar'])->name('domicilios.agregar')->middleware('sesion.iniciada');
Route::get('domicilios/{id}', [DomicilioController::class,'mostrar'])->name('domicilios.mostrar')->middleware('sesion.iniciada');
Route::post('domicilios', [DomicilioController::class,'insertar'])->name('domicilios.insertar')->middleware('sesion.iniciada');
Route::get('domicilios/{id}/modificar', [DomicilioController::class,'modificar'])->name('domicilios.modificar')->middleware('sesion.iniciada');
Route::put('domicilios/{domicilio}', [DomicilioController::class,'actualizar'])->name('domicilios.actualizar')->middleware('sesion.iniciada');
Route::delete('domicilios/{domicilio}', [DomicilioController::class,'eliminar'])->name('domicilios.eliminar')->middleware('sesion.iniciada');
