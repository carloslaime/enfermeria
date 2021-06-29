<?php
use App\Http\Controllers\PacienteController;

Route::get('pacientes', [PacienteController::class,'index'])->name('pacientes.index')->middleware('sesion.iniciada');
Route::get('pacientes/agregar', [PacienteController::class,'agregar'])->name('pacientes.agregar')->middleware('sesion.iniciada');
Route::get('pacientes/{id}', [PacienteController::class,'mostrar'])->name('pacientes.mostrar')->middleware('sesion.iniciada');
Route::post('pacientes', [PacienteController::class,'insertar'])->name('pacientes.insertar')->middleware('sesion.iniciada');
Route::get('pacientes/{id}/modificar', [PacienteController::class,'modificar'])->name('pacientes.modificar')->middleware('sesion.iniciada');
Route::put('pacientes/{paciente}', [PacienteController::class,'actualizar'])->name('pacientes.actualizar')->middleware('sesion.iniciada');
Route::delete('pacientes/{paciente}', [PacienteController::class,'eliminar'])->name('pacientes.eliminar')->middleware('sesion.iniciada');
Route::get('enfermeras/personas-activas/buscar', [PacienteController::class,'personasActivas'])->name('pacientes.personasActivas')->middleware('sesion.iniciada');