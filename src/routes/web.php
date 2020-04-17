<?php

Route::group(['namespace'=>'Msafiri\RolesReports\Http\ControllerTest'],function(){
	Route::get('user_role_reports','RolesReportController@reports');
});
