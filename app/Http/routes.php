<?php

Route::get('applogs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//AuthController Routes
Route::group([], function () {
  Route::get('login','Auth\AuthController@getLogin');
  Route::post('login','Auth\AuthController@postLogin');

  // Password reset routes...
  Route::get('password/email', 'Auth\PasswordController@getEmail');
  Route::post('password/email', 'Auth\PasswordController@postEmail');

  Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
  Route::post('password/reset', 'Auth\PasswordController@postReset');

  Route::get('logout',function(){
    \Auth::logout();
    return redirect('login');
  });

});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/','DashboardContoller@getIndex');
  Route::controller('user','UserController');
  Route::controller('teammember','TeammemberController');
  Route::controller('role','RoleController');
  Route::controller('filemanager','FileManagerController');
});
