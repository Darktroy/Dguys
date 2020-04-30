<?php

Route::post('/login', Auth\LoginController::class);
Route::post('/register', Auth\RegisterController::class);
Route::post('/register-delivery-guy', Auth\RegisterDeliveryController::class);
Route::post('/list-cities', Auth\CitiesController::class);
Route::post('/list-Banks', Auth\BanksController::class);
Route::post('/forget-password', Auth\ForgetPasswordController::class);
Route::post('/reset-password/{user}', Auth\ResetPasswordController::class);
