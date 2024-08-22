<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DexController;

Route::get('/', [DexController::class,'index']);

Route::get('/pokemon/{id}', [DexController::class,'show']);