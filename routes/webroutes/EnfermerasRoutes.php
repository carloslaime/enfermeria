<?php
use App\Http\Controllers\EnfermeraController;

Route::get('enfermeras', [EnfermeraController::class,'index'])->name('enfermeras.index')->middleware('sesion.iniciada');
Route::get('enfermeras/agregar', [EnfermeraController::class,'agregar'])->name('enfermeras.agregar')->middleware('sesion.iniciada');
Route::get('enfermeras/{id}', [EnfermeraController::class,'mostrar'])->name('enfermeras.mostrar')->middleware('sesion.iniciada');
Route::post('enfermeras', [EnfermeraController::class,'insertar'])->name('enfermeras.insertar')->middleware('sesion.iniciada');
Route::get('enfermeras/{id}/modificar', [EnfermeraController::class,'modificar'])->name('enfermeras.modificar')->middleware('sesion.iniciada');
Route::put('enfermeras/{enfermera}', [EnfermeraController::class,'actualizar'])->name('enfermeras.actualizar')->middleware('sesion.iniciada');
Route::delete('enfermeras/{enfermera}', [EnfermeraController::class,'eliminar'])->name('enfermeras.eliminar')->middleware('sesion.iniciada');
