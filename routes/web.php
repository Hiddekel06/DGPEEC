<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinisteireController;

Route::get('/', [MinisteireController::class, 'selectIndex'])->name('ministeres.select');
