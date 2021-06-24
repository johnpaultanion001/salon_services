<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'resident', 'as' => 'resident.', 'namespace' => 'Resident', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

    // Brgy Certificate
    Route::resource('brgy_certificate', 'BrgyCertificateController');

    // Certificate Of Residency
    Route::resource('certificate_of_residency', 'CertificateOfResidencyController');

    // Business Permit Clearance
    Route::resource('business_permit_clearance', 'BusinessPermitClearanceController');

     // Appointments
     Route::resource('appointments', 'AppointmentController');

     //barangay_health_certificate
     Route::resource('barangay_health_certificate', 'BarangayHealthCertificateController');

     //Barangay Indigency
     Route::resource('barangay_indigency', 'BarangayIndigencyController');

});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

    // Brgy Certificate
    Route::resource('brgy_certificate', 'BrgyCertificateController');

    // Certificate Of Residency
    Route::resource('certificate_of_residency', 'CertificateOfResidencyController');

    // Business Permit Clearance
    Route::resource('business_permit_clearance', 'BusinessPermitClearanceController');

     // Resident
     Route::get('resident_list', 'ResidentListController@index')->name('resident');

     // Appointments
     Route::resource('appointments', 'AppointmentController');

     //barangay_health_certificate
     Route::resource('barangay_health_certificate', 'BarangayHealthCertificateController');

     //Barangay Indigency
     Route::resource('barangay_indigency', 'BarangayIndigencyController');

     // Appointments
     Route::resource('appointments', 'AppointmentController');
     

});
