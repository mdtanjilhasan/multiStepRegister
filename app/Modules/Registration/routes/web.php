<?php

use App\Modules\Registration\Http\Controllers\ReregistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ReregistrationController::class, 'something']);
Route::post('/',[ReregistrationController::class, 'store']);
