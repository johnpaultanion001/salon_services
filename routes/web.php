<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/', 'Resident\HomeController@index')->name('resident.home');
Auth::routes(['verify' => true]);


Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/account', 'HomeController@account')->name('resident.account');
    Route::post('/account', 'HomeController@update')->name('resident.update');
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
    // Requested Document
    Route::post('message', 'MessageController@message')->name('message.message');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Finder Resident
    Route::get('finder_resident', 'FinderResidentController@index')->name('finder_resident.index');
    // Finder Resident
    Route::get('finder_resident/{resident}', 'FinderResidentController@resident_result')->name('finder_resident.resident_result');
    // Finder Resident Pending Documents
    Route::get('finder_resident/{qr_code}/pending_documents', 'FinderResidentController@pending_documents')->name('finder_resident.pending_documents');

    
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
    
    
});
