<?php

Route::post('/change-password', Auth\ChangePasswordController::class);
Route::post('/user', Auth\AuthenticatedUserController::class);
Route::post('/logout', Auth\LogoutController::class);
Route::post('/client-order-request', 'OrderRequestController@orderRequest');
Route::post('/driver-accept-request', 'OrderRequestController@acceptOrderRequest');
Route::post('/driver-update-location', 'DriverController@updateLocation');
Route::post('/client-accept-driver-offer', 'OrderRequestController@clientAcceptDriverRequest');
Route::post('/reject-order-request', 'OrderRequestController@rejectOrderRequest');
Route::post('/list-all-orders', 'OrderRequestController@listOrderRequest');
Route::post('/list-specific-order', 'OrderRequestController@listOneOrderRequest');
