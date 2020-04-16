<?php

Route::group(['namespace'=>'Msafiri\RolesReports\Http\Controllers'],function(){
	Route::get('user_role_reports','RolesReportController@reports');
});
