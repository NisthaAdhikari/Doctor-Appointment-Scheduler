<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'UserControllers\UserController@getIndex')->name('index');
Route::get('/loginPage', 'UserControllers\UserController@getLoginPage')->name('getLoginPage');
Route::get('/doctorRegistration', 'UserControllers\UserController@getDoctorRegistrationPage')->name('doctorRegistration');

Route::post('/registerDoctor', 'UserControllers\UserRegistrationController@saveData')->name('registerDoctor');
Route::post('/registerPatient', 'UserControllers\UserRegistrationController@savePatientData')->name('registerPatient');
Route::get('/patientRegistration', 'UserControllers\UserController@getPatientRegistrationPage')->name('patientRegistration');

Route::get('/bookingInfo/{id}', 'UserControllers\UserController@getBookingInfo')->name('bookingInfo');
Route::get('{id}/bookingForm/{date}/{day}/{selectedTime}/{mins?}', 'UserControllers\UserController@getBookingForm')->name('bookingForm');

Route::get('/verify/{id}', 'UserControllers\UserController@getPatientProfile')->name('confirmAppointment');

Route::post('/bookingConfirm/{id}/{day}/{date}/{time}', 'UserControllers\AppointmentController@storeAppointmentDetails')->name('bookingConfirm');
Route::post('/confirmedAppointment', 'UserControllers\AppointmentController@confirmedAppointment')->name('confirmedAppointment');

Route::post('/verifyOTP/{no}/{number}/06Zxpp0', 'UserControllers\OTPVerificationController@verifyOTP')->name('verifyOTP');

Route::post('/docProfile', 'UserControllers\UserController@checkDoctorProfile')->name('docProfile');

Route::get('/book', 'UserControllers\UserController@getBookingPage')->name('book');

Route::get('autocomplete', 'UserControllers\SearchController@autocomplete')->name('autocomplete');
//Route::get('autocompleteDoc', 'UserControllers\SearchController@autocompleteName')->name('autocompleteName');

Route::post('/checkLogin', 'UserControllers\UserController@checkLogin')->name('checkLogin');
Route::group(['prefix' => 'patient','middleware'=>'VerifyPatient'],function() {
    Route::get('/patientProfile/{id}', 'UserControllers\UserController@getPatientProfile')->name('patientProfile');
    Route::get('/myAppointments/{id}', 'UserControllers\UserController@getMyAppointments')->name('myAppointments');
    Route::get('/myRepo/{id}', 'UserControllers\UserController@getMyRepository')->name('myRepo');
    Route::get('/askQuestions/{id}', 'UserControllers\QuestionController@getAskQuestionsPage')->name('askQuestions');
    Route::get('/getQuestions/{id}/{docId}', 'UserControllers\QuestionController@getQuestionsPage')->name('getQuestions');
    Route::post('/sendQuestion/{id}/{docId}', 'UserControllers\QuestionController@sendQuestion')->name('sendQuestion');
    Route::get('/editProfile/{id}', 'UserControllers\UserController@edit')->name('editProfile');
    Route::put('/updateProfile/{id}', 'UserControllers\UserController@update')->name('updateProfile');

    Route::get('/askQuestions/{id}/{docId}', 'UserControllers\QuestionController@getDoctorQuestions')->name('getDoctorQuestions');
    Route::get('/deleteRepo/{id}/{userId}', 'UserControllers\UserController@delete')->name('delete');
    Route::get('/cancelApp/{id?}/{userId?}', 'UserControllers\AppointmentController@cancelAppointment')->name('cancelAppointment');
});



/*....................................................................................................................*/
Route::any('/book/searchedDoctor/{speciality?}', 'UserControllers\SearchController@search')->name('searched');

/*....................................................................................................................*/
Route::post('/myRepo/storeReports/{id}', 'UserControllers\UserController@storeReports')->name('storeReports');

Route::get('/logout', 'UserControllers\UserController@logout')->name('logout');
Route::get('/logout', 'UserControllers\DoctorController@logout')->name('logoutDoc');



Route::post('/checkDoctorLogin', 'UserControllers\DoctorController@checkDoctorLogin')->name('checkDoctorLogin');
Route::group(['prefix' => 'doctor','middleware'=>'VerifyDoctor'],function() {
    Route::get('/doctorProfile/{id}', 'UserControllers\DoctorController@getDoctorProfile')->name('doctorProfile');
    Route::get('/editDocProfile/{id}', 'UserControllers\DoctorController@edit')->name('editDocProfile');
    Route::put('/updateDocProfile/{id}', 'UserControllers\DoctorController@update')->name('updateDocProfile');
    Route::get('/allAppointments/{id}', 'UserControllers\DoctorController@getAllAppointments')->name('allAppointments');
    Route::get('/askedQuestions/{id}', 'UserControllers\DoctorController@getAskedQuestions')->name('askedQuestions');
    Route::put('/respond/{id}/{questionId}', 'UserControllers\DoctorController@respond')->name('respond');
    Route::get('/viewPatientDetails/{id}/{pId}', 'UserControllers\DoctorController@viewPatientDetails')->name('viewPatientDetails');

    Route::get('/schedule/{id}', 'UserControllers\DoctorController@schedule')->name('schedule');
    Route::post('/saveSchedule/{id}', 'UserControllers\DoctorController@saveSchedule')->name('saveSchedule');
    Route::get('/editSchedule/{id}/{scheduleId}', 'UserControllers\DoctorController@editSchedule')->name('editSchedule');
    Route::put('/updateSchedule/{id}/{schedule}', 'UserControllers\DoctorController@updateSchedule')->name('updateSchedule');
    Route::get('/deleteSchedule/{id}/{sId}', 'UserControllers\DoctorController@deleteSchedule')->name('deleteSchedule');
});

/*..................................................................................................................*/
    Route::group(['prefix' => 'patient'],function() {
//        Route::get('/patientProfile/{id}', 'UserControllers\UserController@getPatientProfile')->name('patientProfile');



    });



/*..................................................................................................................*/
Route::group(['prefix' => 'doctor'],function() {


});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){
    Route::get('/', 'HomeController@getDashboard');

    Route::get('/dashboard', 'HomeController@getDashboard')->name('dashboard');

    /*------------------------------------*/
    Route::get('/doctor', 'admin\DoctorController@index')->name('admin.doctor.index');
    Route::post('/doctor/store', 'admin\DoctorController@store')->name('admin.doctor.store');
    Route::get('/doctor/{id}/edit', 'admin\DoctorController@edit')->name('admin.doctor.edit');
    Route::get('/doctor/show', 'admin\DoctorController@show')->name('admin.doctor.show');
    Route::post('doctor/update', 'admin\DoctorController@update')->name('admin.doctor.update');
    Route::get('/doctor/{id}', 'admin\DoctorController@destroy')->name('admin.doctor.delete');
    Route::get('/doctor/changeStatus', 'admin\DoctorController@changeStatus')->name('admin.doctor.changeStatus');

    /*------------------------------------*/
    Route::get('/schedule', 'admin\ScheduleController@index')->name('admin.schedule.index');
    Route::post('/schedule/store', 'admin\ScheduleController@store')->name('admin.schedule.store');
    Route::get('/schedule/{id}/edit', 'admin\ScheduleController@edit')->name('admin.schedule.edit');
    Route::get('/schedule/show', 'admin\ScheduleController@show')->name('admin.schedule.show');
    Route::post('schedule/update', 'admin\ScheduleController@update')->name('admin.schedule.update');
    Route::get('/schedule/{id}', 'admin\ScheduleController@destroy')->name('admin.schedule.delete');
    Route::get('/schedule/changeStatus', 'admin\ScheduleController@changeStatus')->name('admin.schedule.changeStatus');


    /*------------------------------------*/
    Route::get('/doctorSchedule', 'admin\DoctorScheduleController@index')->name('admin.doctorSchedule.index');
    Route::post('/doctorSchedule/store', 'admin\DoctorScheduleController@store')->name('admin.doctorSchedule.store');
    Route::get('/doctorSchedule/{id}/edit', 'admin\DoctorScheduleController@edit')->name('admin.doctorSchedule.edit');
    Route::get('/doctorSchedule/show', 'admin\DoctorScheduleController@show')->name('admin.doctorSchedule.show');
    Route::post('doctorSchedule/update', 'admin\DoctorScheduleController@update')->name('admin.doctorSchedule.update');
    Route::get('/doctorSchedule/{id}', 'admin\DoctorScheduleController@destroy')->name('admin.doctorSchedule.delete');
    Route::get('/doctorSchedule/changeStatus', 'admin\DoctorScheduleController@changeStatus')->name('admin.doctorSchedule.changeStatus');

});







