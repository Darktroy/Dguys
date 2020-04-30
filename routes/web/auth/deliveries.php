<?php

Route::get('/create', 'DeliveryGuyDetailsController@create')
    ->name('delivery_guy_details.delivery_guy_details.create');
Route::get('/show/{deliveryGuyDetails}', 'DeliveryGuyDetailsController@show')
    ->name('delivery_guy_details.delivery_guy_details.show')->where('id', '[0-9]+');
Route::get('/{deliveryGuyDetails}/edit', 'DeliveryGuyDetailsController@edit')
    ->name('delivery_guy_details.delivery_guy_details.edit')->where('id', '[0-9]+');
Route::post('/', 'DeliveryGuyDetailsController@store')
    ->name('delivery_guy_details.delivery_guy_details.store');
Route::put('delivery_guy_details/{deliveryGuyDetails}', 'DeliveryGuyDetailsController@update')
    ->name('delivery_guy_details.delivery_guy_details.update')->where('id', '[0-9]+');
Route::delete('/delivery_guy_details/{deliveryGuyDetails}', 'DeliveryGuyDetailsController@destroy')
    ->name('delivery_guy_details.delivery_guy_details.destroy')->where('id', '[0-9]+');
