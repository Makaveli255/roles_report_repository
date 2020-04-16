<?php

Route::group(['namespace'=>'Msafiri\RolesReports\Http\controllers'],function(){
	Route::get('user_role_reports','RolesReportController@reports');
});
