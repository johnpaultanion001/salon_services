<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/', 'Customer\HomeController@index')->name('resident.home');
Route::post('send_msg', 'Customer\HomeController@send_msg')->name('resident.send_msg');
Auth::routes(['verify' => true]);


Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/account', 'HomeController@account')->name('customer.account');
    Route::post('/account', 'HomeController@update')->name('customer.update');
    Route::put('/account/change_password/{user}', 'HomeController@passwordupdate')->name('customer.passwordupdate');
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth', 'verified','checkCustomerValidation']], function () {
    // Appointment
    Route::get('appointment_service', 'AppointmentServiceController@index')->name('appointment_service.index');
    // Appointment
    Route::get('appointment_service/{service}', 'AppointmentServiceController@appointment')->name('appointment_service.appointment');
    // Appointment
    Route::post('appointment_service/{service}', 'AppointmentServiceController@appointment_store')->name('appointment_service.appointment_store');



    // manage appointment
    Route::get('manage_appointment', 'AppointmentServiceController@manage_appointment')->name('manage_appointment.index');
    // appointment Filter
    Route::get('manage_appointment/{filter}/filter', 'AppointmentServiceController@filter')->name('manage_appointment.filter');
    Route::get('manage_appointment/{appointment}/edit', 'AppointmentServiceController@appointment_edit')->name('manage_appointment.edit');
    Route::post('manage_appointment/{appointment}', 'AppointmentServiceController@appointment_update')->name('manage_appointment.update');
    Route::delete('manage_appointment/{appointment}/cancel', 'AppointmentServiceController@appointment_cancel')->name('manage_appointment.cancel');

    Route::post('message', 'MessageController@message')->name('message.message');



});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Mange Customer
    Route::get('customers', 'CustomerController@index')->name('customers.index');
    Route::get('customers/{customer}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('customers/{customer}', 'CustomerController@update')->name('customers.update');

    //Manage Appointment
    Route::get('manage_appointments', 'ManageAppointmentsController@index')->name('manage_appointments.index');
    Route::get('manage_appointments/{appointment}', 'ManageAppointmentsController@edit')->name('manage_appointments.edit');
    Route::post('manage_appointments/{appointment}', 'ManageAppointmentsController@update')->name('manage_appointments.update');


    //Appointment Message
    Route::get('message/{appointment}', 'MessageController@message')->name('message.message');
    Route::post('message/{appointment}', 'MessageController@message_store')->name('message.message_store');

    //Services
    Route::resource('services', 'ServiceController');

    //Accounts
    Route::get('staffs', 'AccountController@staffs')->name('account.staffs');
    Route::get('admins', 'AccountController@admins')->name('account.admins');

    Route::post('account/store', 'AccountController@store')->name('account.store');
    Route::get('account/{account}/edit', 'AccountController@edit')->name('account.edit');
    Route::put('account/{account}', 'AccountController@update')->name('account.update');
    Route::delete('account/{account}', 'AccountController@destroy')->name('account.destroy');



    //Payroll
    Route::resource('payroll', 'PayrollController');

    Route::get('my_payroll', 'PayrollController@my_payroll')->name('payroll.my_payroll');
    Route::get('my_attendance', 'AttendanceController@my_attendance')->name('attendance.my_attendance');



    //Attendance
    Route::resource('attendances', 'AttendanceController');
    Route::post('attendances/{attendance}/attend', 'AttendanceController@attend')->name('attendance.attend');
    Route::post('feedback', 'FeedbackController@store')->name('feedback.store');
    Route::get('feedback', 'FeedbackController@index')->name('feedback.index');


});
