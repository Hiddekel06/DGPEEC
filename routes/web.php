<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinisteireController;
use App\Http\Controllers\DataCollectionController;
use App\Http\Controllers\AuthController;

Route::get('/', [MinisteireController::class, 'selectIndex'])->name('ministeres.select');
Route::post('/ministere/select', [MinisteireController::class, 'handleSelection'])->name('ministeres.handle');

// Routes d'authentification
Route::get('/auth/{ministere}', [AuthController::class, 'showLogin'])->name('auth.login-form');
Route::post('/auth/{ministere}', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout/{ministere}', [AuthController::class, 'logout'])->name('auth.logout');

// Flux normal avec matricule
Route::get('/formulaire/{ministere}', [DataCollectionController::class, 'showForm'])->middleware('check.agent.auth')->name('form.show');
Route::post('/formulaire/{ministere}', [DataCollectionController::class, 'submitForm'])->middleware('check.agent.auth')->name('form.submit');

// Flux direct CFJ (sans matricule)
Route::get('/formulaire-cfj/{ministere}', [DataCollectionController::class, 'showFormDirect'])->middleware('check.agent.auth')->name('form.show-direct');
Route::post('/formulaire-cfj/{ministere}', [DataCollectionController::class, 'submitFormDirect'])->middleware('check.agent.auth')->name('form.submit-direct');

Route::get('/success', [DataCollectionController::class, 'success'])->name('form.success');
