<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::redirect('/', '/login');
Auth::routes(['verify' => true]);

Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth', 'verified']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Finder Resident
    Route::get('finder_resident', 'FinderResidentController@index')->name('finder_resident.index');
    // Finder Resident
    Route::get('finder_resident/{qr_code}', 'FinderResidentController@qr_result')->name('finder_resident.qr_result');
    // Finder Resident Pending Documents
    Route::get('finder_resident/{qr_code}/pending_documents', 'FinderResidentController@pending_documents')->name('finder_resident.pending_documents');

    //Requested Document 
    Route::get('requested_document/{requested}', 'RequestedDocumentController@requested_document')->name('requested_document.requested_document');
    //Requested Document Payment Status
    Route::get('requested_document/payment_status/payment_status', 'RequestedDocumentController@payment_status')->name('requested_document.payment_status');
    //Requested Document Status
    Route::get('requested_document/status/status', 'RequestedDocumentController@status')->name('requested_document.status');
});
