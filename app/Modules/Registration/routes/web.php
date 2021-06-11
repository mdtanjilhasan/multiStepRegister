<?php

use App\Modules\Registration\Http\Controllers\ReregistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/registration',[ReregistrationController::class, 'something']);
