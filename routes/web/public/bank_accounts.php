<?php
Route::group(['prefix' => 'bank_account_details'], function () {
    Route::get('/', 'BankAccountController@index')
        ->name('bank_account_details.bank_account_details.index');
});
Route::get('/show/{bankAccountDetails}', 'BankAccountController@show')
    ->name('bank_account_details.bank_account_details.show')->where('id', '[0-9]+');
