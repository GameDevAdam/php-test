<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DexController;

Route::get('/', [DexController::class,'index']);
