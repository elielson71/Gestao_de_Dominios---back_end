<?php

use App\Http\Controllers\api\DomainController;
use Illuminate\Support\Facades\Route;


Route::apiResource('domain', DomainController::class);
