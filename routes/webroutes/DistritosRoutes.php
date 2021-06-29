<?php
use App\Http\Controllers\DistritoController;

Route::get('distritos', [DistritoController::class,'index'])->name('distritos.index')->middleware('sesion.iniciada');
Route::get('distritos/agregar', [DistritoController::class,'agregar'])->name('distritos.agregar')->middleware('sesion.iniciada');
Route::get('distritos/{id}', [DistritoController::class,'mostrar'])->name('distritos.mostrar')->middleware('sesion.iniciada');
Route::post('distritos', [DistritoController::class,'insertar'])->name('distritos.insertar')->middleware('sesion.iniciada');
Route::get('distritos/{id}/modificar', [DistritoController::class,'modificar'])->name('distritos.modificar')->middleware('sesion.iniciada');
Route::put('distritos/{distrito}', [DistritoController::class,'actualizar'])->name('distritos.actualizar')->middleware('sesion.iniciada');
Route::delete('distritos/{distrito}', [DistritoController::class,'eliminar'])->name('distritos.eliminar')->middleware('sesion.iniciada');
