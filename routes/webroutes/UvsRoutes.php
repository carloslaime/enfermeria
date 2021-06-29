<?php
use App\Http\Controllers\UvController;

Route::get('uvs', [UvController::class,'index'])->name('uvs.index')->middleware('sesion.iniciada');
Route::get('uvs/agregar', [UvController::class,'agregar'])->name('uvs.agregar')->middleware('sesion.iniciada');
Route::get('uvs/{id}', [UvController::class,'mostrar'])->name('uvs.mostrar')->middleware('sesion.iniciada');
Route::post('uvs', [UvController::class,'insertar'])->name('uvs.insertar')->middleware('sesion.iniciada');
Route::get('uvs/{id}/modificar', [UvController::class,'modificar'])->name('uvs.modificar')->middleware('sesion.iniciada');
Route::put('uvs/{uv}', [UvController::class,'actualizar'])->name('uvs.actualizar')->middleware('sesion.iniciada');
Route::delete('uvs/{uv}', [UvController::class,'eliminar'])->name('uvs.eliminar')->middleware('sesion.iniciada');
