<?php
use App\Http\Controllers\FormaPagoController;

Route::get('formas_pagos', [FormaPagoController::class,'index'])->name('formas_pagos.index')->middleware('sesion.iniciada');
Route::get('formas_pagos/agregar', [FormaPagoController::class,'agregar'])->name('formas_pagos.agregar')->middleware('sesion.iniciada');
Route::get('formas_pagos/{id}', [FormaPagoController::class,'mostrar'])->name('formas_pagos.mostrar')->middleware('sesion.iniciada');
Route::post('formas_pagos', [FormaPagoController::class,'insertar'])->name('formas_pagos.insertar')->middleware('sesion.iniciada');
Route::get('formas_pagos/{id}/modificar', [FormaPagoController::class,'modificar'])->name('formas_pagos.modificar')->middleware('sesion.iniciada');
Route::put('formas_pagos/{forma_pago}', [FormaPagoController::class,'actualizar'])->name('formas_pagos.actualizar')->middleware('sesion.iniciada');
Route::delete('formas_pagos/{forma_pago}', [FormaPagoController::class,'eliminar'])->name('formas_pagos.eliminar')->middleware('sesion.iniciada');
