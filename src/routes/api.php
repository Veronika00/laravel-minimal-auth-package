<?php

Route::group(['namespace'=>'Pulovessy\Auth\Http\Controllers'], function() {
    Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('abonents', AbonentController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});

});





