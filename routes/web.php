<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinisteireController;

// Page de sélection des ministères
Route::get('/', [MinisteireController::class, 'selectIndex'])->name('ministeres.select');

// Téléchargement de la maquette
Route::get('/download/{code}', [MinisteireController::class, 'downloadTemplate'])->name('template.download');
