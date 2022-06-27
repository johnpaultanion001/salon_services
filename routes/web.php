<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/', 'Resident\HomeController@index')->name('resident.home');
Route::post('send_msg', 'Resident\HomeController@send_msg')->name('resident.send_msg');
Auth::routes(['verify' => true]);


Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/account', 'HomeController@account')->name('resident.account');
    Route::post('/account', 'HomeController@update')->name('resident.update');
    Route::put('/account/change_password/{user}', 'HomeController@passwordupdate')->name('resident.passwordupdate');
});

Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth', 'verified','checkResidentValidation']], function () {
    // Request Document
    Route::get('request_document', 'DocumentController@index')->name('request_document.index');
    // Request Document
    Route::get('request_document/{document}', 'DocumentController@request')->name('request_document.request');
    // Request Document
    Route::post('request_document/{document}', 'DocumentController@request_store')->name('request_document.request_store');

   

    // Requested Document
    Route::get('requested_document', 'DocumentController@requested_document')->name('requested_document.index');
    Route::get('requested_document/{request}/edit', 'DocumentController@requested_edit')->name('requested_document.edit');
     // Request Document
    Route::post('requested_document/{request_id}', 'DocumentController@request_update')->name('requested_document.request_update');
    Route::delete('requested_document/{request_id}/cancel', 'DocumentController@request_cancel')->name('requested_document.request_cancel');

    // Requested Document
    Route::post('message', 'MessageController@message')->name('message.message');

    // Requested Filter 
    Route::get('requested_document/{filter}/filter', 'DocumentController@filter')->name('requested_document.filter');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Finder Resident
    Route::get('finder_resident', 'FinderResidentController@index')->name('finder_resident.index');
    // Finder Resident
    Route::get('finder_resident/{resident}', 'FinderResidentController@resident_result')->name('finder_resident.resident_result');
    

    
    // //Requested Document Payment Status
    // Route::get('requested_document/payment_status/payment_status', 'RequestedDocumentController@payment_status')->name('requested_document.payment_status');
    // //Requested Document Status
    // Route::get('requested_document/status/status', 'RequestedDocumentController@status')->name('requested_document.status');

    //Mange Resident
    Route::get('residents', 'ResidentController@index')->name('residents.index');
    Route::get('residents/{resident}/edit', 'ResidentController@edit')->name('residents.edit');
    Route::post('residents/{resident}', 'ResidentController@update')->name('residents.update');

    //Manage Requested Documents
    Route::get('requested_documents', 'RequestedDocumentController@index')->name('requested_documents.index');
    //Requested Document 
    Route::get('requested_documents/{requested}', 'RequestedDocumentController@requested')->name('requested_document.requested');
    //Requested Document 
    Route::post('requested_documents/{requested}', 'RequestedDocumentController@update_requested')->name('requested_document.update_requested');
    //Requested Document Message
    Route::get('message/{requested}', 'MessageController@message')->name('message.message');
    Route::post('message/{requested}', 'MessageController@message_store')->name('message.message_store');

    //Documents
    Route::resource('documents', 'DocumentController');

    //Accounts
    Route::get('staffs', 'AccountController@staffs')->name('account.staffs');
    Route::get('admins', 'AccountController@admins')->name('account.admins');
    
    Route::post('account/store', 'AccountController@store')->name('account.store');
    Route::get('account/{account}/edit', 'AccountController@edit')->name('account.edit');
    Route::put('account/{account}', 'AccountController@update')->name('account.update');
    Route::delete('account/{account}', 'AccountController@destroy')->name('account.destroy');
    
    //Activity Logs
    Route::get('activity_logs', 'ActivityLogController@index')->name('logs.index');
    
});
