<?php
namespace Msafiri\RolesReports;
use Illuminate\Support\ServiceProvider;

class RolesReportServiceProvider extends ServiceProvider
{
	public function boot(){
      
      $this->loadRoutesFrom(__DIR__.'/routes/web.php');
      $this->mergeConfigFrom(__DIR__.'/config/roles_dept.php','roles_dept');
      $this->publishes([
        __DIR__.'/config/roles_dept.php' => config_path('roles_dept.php'),
    ]);
	}

	public function register(){

	}

}