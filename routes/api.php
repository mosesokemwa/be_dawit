<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Middleware\VerifyFormApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([VerifyFormApiKey::class])->group(function () {
    Route::apiResource('form', ContactFormController::class);
});


