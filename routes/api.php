<?php

use App\Http\Controllers\TechnicalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/newUser', [TechnicalController::class, 'newUser']);
Route::post('/AllNotApprovedUsers', [TechnicalController::class, 'AllNotApprovedUsers']);
Route::post('/ApproveUser', [TechnicalController::class, 'ApproveUser']);

