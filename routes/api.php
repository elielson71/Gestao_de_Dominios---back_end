<?php

use App\Http\Controllers\api\DomainController;
use Illuminate\Support\Facades\Route;


Route::resource('/domain', DomainController::class);
