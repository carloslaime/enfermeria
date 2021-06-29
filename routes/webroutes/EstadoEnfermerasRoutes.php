<?php
use App\Http\Controllers\EstadoEnfermeraController;

Route::get('estadoenfermeras', [EstadoEnfermeraController::class,'index'])->name('estadoenfermeras.index')->middleware('sesion.iniciada');
Route::get('estadoenfermeras/agregar', [EstadoEnfermeraController::class,'agregar'])->name('estadoenfermeras.agregar')->middleware('sesion.iniciada');
Route::get('estadoenfermeras/{id}', [EstadoEnfermeraController::class,'mostrar'])->name('estadoenfermeras.mostrar')->middleware('sesion.iniciada');
Route::post('estadoenfermeras', [EstadoEnfermeraController::class,'insertar'])->name('estadoenfermeras.insertar')->middleware('sesion.iniciada');
Route::get('estadoenfermeras/{id}/modificar', [EstadoEnfermeraController::class,'modificar'])->name('estadoenfermeras.modificar')->middleware('sesion.iniciada');
Route::put('estadoenfermeras/{estadoenfermera}', [EstadoEnfermeraController::class,'actualizar'])->name('estadoenfermeras.actualizar')->middleware('sesion.iniciada');
Route::delete('estadoenfermeras/{estadoenfermera}', [EstadoEnfermeraController::class,'eliminar'])->name('estadoenfermeras.eliminar')->middleware('sesion.iniciada');
