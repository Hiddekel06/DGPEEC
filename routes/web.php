<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinisteireController;
use App\Http\Controllers\DataCollectionController;

Route::get('/', [MinisteireController::class, 'selectIndex'])->name('ministeres.select');
Route::post('/ministere/select', [MinisteireController::class, 'handleSelection'])->name('ministeres.handle');

Route::get('/matricule/{ministere}', [DataCollectionController::class, 'showMatricule'])->name('matricule.show');
Route::post('/matricule/{ministere}', [DataCollectionController::class, 'validateMatricule'])->name('matricule.validate');

Route::get('/formulaire/{ministere}/{matricule}', [DataCollectionController::class, 'showForm'])->name('form.show');
Route::post('/formulaire/{ministere}/{matricule}', [DataCollectionController::class, 'submitForm'])->name('form.submit');

Route::get('/success', [DataCollectionController::class, 'success'])->name('form.success');
