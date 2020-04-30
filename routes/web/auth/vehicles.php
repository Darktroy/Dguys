<?php

Route::get('/create', 'VehicleDetailsController@create')
    ->name('vehicle_details.vehicle_details.create');
Route::get('/show/{vehicleDetails}', 'VehicleDetailsController@show')
    ->name('vehicle_details.vehicle_details.show')->where('id', '[0-9]+');
Route::get('/{vehicleDetails}/edit', 'VehicleDetailsController@edit')
    ->name('vehicle_details.vehicle_details.edit')->where('id', '[0-9]+');
Route::post('/', 'VehicleDetailsController@store')
    ->name('vehicle_details.vehicle_details.store');
Route::put('vehicle_details/{vehicleDetails}', 'VehicleDetailsController@update')
    ->name('vehicle_details.vehicle_details.update')->where('id', '[0-9]+');
Route::delete('/vehicle_details/{vehicleDetails}', 'VehicleDetailsController@destroy')
    ->name('vehicle_details.vehicle_details.destroy')->where('id', '[0-9]+');
