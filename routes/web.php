<?php

Route::get('/test',[
    'uses' => 'TestController@test',
]);


Route::get('/',[
  'uses' => 'GuestController@index',
  'as' => 'index'
]);

Route::get('/doctors/list',[
  'uses' =>'GuestController@list',
  'as' => 'list'
]);

Route::get('/doctor/profile/{id}',[
  'uses' => 'GuestController@profile',
  'as' => 'profile'
]);

Route::get('/patient/profile/{id}',[
  'uses' => 'GuestController@patient',
  'as' => 'patient.profile'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/register/patient',[
  'uses' => 'UserController@store',
  'as' => 'patient.add'
])->middleware('guest');

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function(){
  Route::get('edit',[
    'uses' => 'UserController@edit',
    'as' => 'user.profile.edit'
  ]);

  Route::post('update/photo',[
    'uses' => 'UserController@picture',
    'as' => 'user.profile.picture'
  ]);

  Route::post('update/information',[
    'uses' => 'UserController@information',
    'as' => 'user.profile.information'
  ]);

  Route::post('update/address',[
    'uses' => 'UserController@address',
    'as' => 'user.profile.address'
  ]);

  Route::post('update/password',[
    'uses' => 'UserController@password',
    'as' => 'user.profile.password'
  ]);

  Route::post('update/specialities',[
    'uses' => 'UserController@specialities',
    'as' => 'user.profile.specialities'
  ]);


  Route::get('prescription/list/{id}',[
    'uses' => 'PrescriptionController@index',
    'as' => 'prescription.list'
  ]);

  Route::get('prescription/show/{id}',[
    'uses' => 'PrescriptionController@show',
    'as' => 'show.prescription'
  ]);

});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'],function(){


  //Accountant Routes for Admin

  Route::get('accountants/index',[
    'uses' => 'AccountantController@index',
    'as' => 'admin.accountant.index'
  ]);

  Route::get('accountant/add',[
    'uses' => 'AccountantController@create',
    'as' => 'admin.accountant.add'
  ]);

  Route::post('accountant/add',[
    'uses' => 'AccountantController@store',
    'as' => 'admin.accountant.store'
  ]);

  Route::get('accountant/edit/{id}',[
    'uses' => 'AccountantController@edit',
    'as' => 'admin.accountant.edit'
  ]);

  Route::post('accountant/update/{id}',[
    'uses' => 'AccountantController@update',
    'as' => 'admin.accountant.update'
  ]);

  Route::get('accountant/delete/{id}',[
    'uses' => 'AccountantController@destroy',
    'as' => 'admin.accountant.delete'
  ]);




  ///Departments Routes Here.


  Route::get('department/index',[
    'uses' => 'DepartmentController@index',
    'as' => 'department.index'
  ]);

  Route::get('department/add',[
    'uses' => 'DepartmentController@create',
    'as' => 'department.add'
  ]);

  Route::post('department/add/store',[
    'uses' => 'DepartmentController@store',
    'as' => 'department.store'
  ]);

  Route::get('department/edit/{id}',[
    'uses' => 'DepartmentController@edit',
    'as' => 'department.edit'
  ]);

  Route::post('department/update/{id}',[
    'uses' => 'DepartmentController@update',
    'as' => 'department.update'
  ]);

  Route::get('department/delete/{id}',[
    'uses' => 'DepartmentController@destroy',
    'as' => 'department.delete'
  ]);

  ///Doctors Routes for Admin Panel.


  Route::get('doctor/index',[
    'uses' => 'DoctorController@index',
    'as' => 'admin.doctor.index'
  ]);

  Route::get('doctor/add',[
    'uses' => 'DoctorController@create',
    'as' => 'admin.doctor.add'
  ]);

  Route::post('doctor/store',[
    'uses' => 'DoctorController@store',
    'as' => 'admin.doctor.store'
  ]);

  Route::get('doctor/edit/{id}',[
    'uses' => 'DoctorController@edit',
    'as' => 'admin.doctor.edit'
  ]);

  Route::post('doctor/update/{id}',[
    'uses' => 'DoctorController@update',
    'as' => 'admin.doctor.update'
  ]);

  Route::get('doctor/delete/{id}',[
    'uses' => 'DoctorController@destroy',
    'as' => 'admin.doctor.delete'
  ]);

  // Patient's Router

  Route::get('patients/index',[
    'uses' => 'PatientController@index',
    'as' => 'admin.patient.index'
  ]);

  Route::get('patient/add',[
    'uses' => 'PatientController@create',
    'as' => 'admin.patient.add'
  ]);

  Route::post('patient/store',[
    'uses' => 'PatientController@store',
    'as' => 'admin.patient.store'
  ]);

  Route::get('patient/edit/{id}',[
    'uses' => 'PatientController@edit',
    'as' => 'admin.patient.edit'
  ]);

  Route::post('patient/update/{id}',[
    'uses' => 'PatientController@update',
    'as' => 'admin.patient.update'
  ]);

  Route::get('patient/delete/{id}',[
    'uses' => 'PatientController@destroy',
    'as' => 'admin.patient.delete'
  ]);

  //Appointments Router for Admin panel

  Route::get('appointments/index',[
    'uses' => 'AdminAppointmentController@index',
    'as' => 'admin.appointment.index'
  ]);

  Route::get('appointment/sent/doctor/{id}',[
    'uses' => 'AdminAppointmentController@sent',
    'as' => 'admin.appointment.sent'
  ]);

  Route::get('appointment/accept/{id}',[
    'uses' => 'AdminAppointmentController@adminAccept',
    'as' => 'admin.appointment.accept'
  ]);

  Route::get('appointment/reject/{id}',[
    'uses' => 'AdminAppointmentController@adminReject',
    'as' => 'admin.appointment.reject'
  ]);



});





Route::group(['prefix' => 'accountant', 'middleware' => 'accountant'], function(){

    Route::get('unverified/appointment/list',[
      'uses' => 'AccountantAppointmentController@unverifiedList',
      'as' => 'accountant.unverified.appointment.list'
    ]);

    Route::get('verified/appointment/list',[
      'uses' => 'AccountantAppointmentController@verifiedList',
      'as' => 'accountant.verified.appointment.list'
    ]);

    Route::get('appointment/details/{id}',[
      'uses' => 'AccountantAppointmentController@show',
      'as' => 'accountant.appointment.get'
    ]);

    Route::get('appointment/payment/verify/{id}',[
      'uses' => 'AccountantAppointmentController@verify',
      'as' => 'accountant.appointment.verify'
    ]);

    Route::get('get/appointment/identity',[
      'uses' => 'AccountantAppointmentController@recieption',
      'as' => 'accountant.appointment.recieption'
    ]);

    Route::post('result/appointment/identity',[
      'uses' => 'AccountantAppointmentController@recieptionSubmit',
      'as' => 'accountant.appointment.recieption.submit'
    ]);
});







Route::group(['prefix' => 'doctor', 'middleware' => 'doctor'],function(){
  //Appointment Routes For doctors

  Route::get('appointment/index',[
    'uses' => 'AdminAppointmentController@doctorIndex',
    'as' => 'doctor.appointment.index'
  ]);

  Route::get('appointment/view/{id}',[
    'uses' => 'AdminAppointmentController@doctorView',
    'as' => 'doctor.appointment.view'
  ]);

  Route::post('appointment/doctor/update/{id}',[
    'uses' => 'AdminAppointmentController@confirm',
    'as' => 'doctor.appointment.submit'
  ]);

  Route::get('appointment/accept/{id}',[
    'uses' => 'AdminAppointmentController@doctorAccept',
    'as' => 'doctor.appointment.accept'
  ]);

  Route::get('appointment/reject/{id}',[
    'uses' => 'AdminAppointmentController@doctorReject',
    'as' => 'doctor.appointment.reject'
  ]);

  Route::get('patient/list/{id}',[
    'uses' => 'AppointmentController@patientList',
    'as' => 'doctor.patient.list'
  ]);

  Route::get('patient/prescription/create/{id}',[
    'uses' => 'PrescriptionController@create',
    'as' => 'create.prescription'
  ]);

  Route::post('patient/prescription/store',[
    'uses' => 'PrescriptionController@store',
    'as' => 'prescription.store'
  ]);

  Route::get('patient/prescription/edit/{id}',[
    'uses' => 'PrescriptionController@edit',
    'as' => 'prescription.edit'
  ]);

  Route::post('patient/prescription/store/{id}',[
    'uses' => 'PrescriptionController@update',
    'as' => 'prescription.update'
  ]);


});


Route::group(['prefix' => 'patient', 'middleware' => 'patient'],function(){
    // Appointments Routes


    Route::get('appointments/index',[
      'uses' => 'AppointmentController@index',
      'as' => 'patient.appointment.index'
    ]);

    Route::get('appointment/doctors',[
      'uses' => 'AppointmentController@getDoctors',
      'as' => 'patient.appointment.doctors'
    ]);

    Route::post('appointment/doctors/results',[
      'uses' => 'AppointmentController@getResults',
      'as' => 'patient.appointment.department.submit'
    ]);

    Route::get('appointment/create/{id}',[
      'uses' => 'AppointmentController@create',
      'as' => 'patient.appointment.take'
    ]);

    Route::post('appointment/submit',[
      'uses' => 'AppointmentController@store',
      'as' => 'patient.appointment.submit'
    ]);

    Route::get('appointment/edit/{id}',[
      'uses' => 'AppointmentController@edit',
      'as' => 'patient.appointment.edit'
    ]);

    Route::post('appointment/update/{id}',[
      'uses' => 'AppointmentController@update',
      'as' => 'patient.appointment.update'
    ]);

    Route::get('appointment/delete/{id}',[
      'uses' => 'AppointmentController@destroy',
      'as' => 'patient.appointment.delete'
    ]);

    Route::get('appointment/pay/{id}',[
      'uses' => 'AppointmentController@pay',
      'as' => 'patient.appointment.pay'
    ]);

    Route::get('appointment/pay/proceed/{id}',[
      'uses' => 'AppointmentController@proceed',
      'as' => 'patient.appointment.proceed'
    ]);

    Route::post('appointment/checkout/{id}',[
      'uses' => 'AppointmentController@checkout',
      'as' => 'patient.appointment.checkout'
    ]);

    Route::get('appointment/paid/details/{id}',[
      'uses' => 'AppointmentController@details',
      'as' => 'patient.appointment.paid.details'
    ]);
});


Route::get('/doctors/search',function(){
    $doctors = App\User::where('name','like','%'.request('query').'%')->where('isDoctor',1)->paginate(6);

    return view('results')->with('doctors',$doctors)->with('query',request('query'));
});

Route::get('/home/department/doctors/{id}',function($id){
    $doctors = App\Doctor::where('department_id',$id)->paginate(15);
    $dep = App\Department::find($id);
    $name = $dep->name;

    return view('departments')->with('doctors',$doctors)->with('name',$name);
})->name('department.doctor');



Route::get('/patient/consult/{id}',[
  'uses' => 'PrescriptionController@chat',
  'as' => 'patient.consult'
]);


// Route::get('chat', 'ChatsController@index');
// Route::get('messages', 'ChatsController@fetchMessages');
// Route::post('messages', 'ChatsController@sendMessage');
// Broadcast::channel('chat', function ($user) {
//   return Auth::check();
// });
