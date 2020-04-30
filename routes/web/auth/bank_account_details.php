<?php

Route::get('/create', 'BankAccountController@create')
    ->name('bank_account_details.bank_account_details.create');

Route::get('/{bankAccountDetails}/edit', 'BankAccountController@edit')
    ->name('bank_account_details.bank_account_details.edit')->where('id', '[0-9]+');
Route::post('/', 'BankAccountController@store')
    ->name('bank_account_details.bank_account_details.store');
Route::put('bank_account_details/{bankAccountDetails}', 'BankAccountController@update')
    ->name('bank_account_details.bank_account_details.update')->where('id', '[0-9]+');
Route::delete('/bank_account_details/{bankAccountDetails}', 'BankAccountController@destroy')->name('bank_account_details.bank_account_details.destroy')->where('id', '[0-9]+');
