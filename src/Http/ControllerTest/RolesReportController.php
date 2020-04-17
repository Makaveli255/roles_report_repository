<?php

namespace Msafiri\RolesReports\Http\ControllerTest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Excel;
use Msafiri\RolesReports\Exports\RolesExports;
// use Maatwebsite\Excel\ExcelServiceProvider\Excel;

class RolesReportController extends Controller
{

    public function reports(){

    	try {
    		if (config('roles_dept.startHead.head') == "opt-one" && config('roles_dept.startHead.head') == "opt-two") {

        }else{
    		if (config('roles_dept.startHead.head') == "opt-one") {
    	$users = DB::table(config('roles_dept.usersTable.tablename'))
    	->select(config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.userIdColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),config('roles_dept.usersTable.firstnameColumn'),config('roles_dept.usersTable.middlenameColumn'),config('roles_dept.usersTable.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn').' as deptname',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn').' as rolename')
    	->leftJoin(config('roles_dept.userRoleTable.tablename'),config('roles_dept.userRoleTable.tablename').'.'.config('roles_dept.userRoleTable.userIdColumn'),'=',config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.userIdColumn'))
    	->leftJoin(config('roles_dept.rolesTable.tablename'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'),'=',config('roles_dept.userRoleTable.tablename').'.'.config('roles_dept.userRoleTable.roleIdColumn'))
    	->leftJoin(config('roles_dept.deptTable.tablename'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),'=',config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.deptIdColumn'))
    	->get();
    	// return $users;
    	return Excel::download(new RolesExports((object)$users),'user_roles.xlsx');
    	}elseif (config('roles_dept.startHead.head') == "opt-two") {
    	$users = DB::table(config('roles_dept.usersTable.tablename'))
    	->select(config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.userIdColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),config('roles_dept.usersTable.firstnameColumn'),config('roles_dept.usersTable.middlenameColumn'),config('roles_dept.usersTable.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn').' as deptname',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn').' as rolename',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'))
    	// ->leftJoin(config('roles_dept.userRoleTable.tablename'),config('roles_dept.userRoleTable.tablename').'.'.config('roles_dept.userRoleTable.userIdColumn'),'=',config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.userIdColumn'))
    	->leftJoin(config('roles_dept.rolesTable.tablename'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'),'=',config('roles_dept.usersTable.tablename').'.'.config('roles_dept.userRoleTable.roleIdColumn'))
    	->leftJoin(config('roles_dept.deptTable.tablename'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),'=',config('roles_dept.usersTable.tablename').'.'.config('roles_dept.usersTable.deptIdColumn'))
    	->get();
    	// return (object)$users;
    	return Excel::download(new RolesExports((object)$users),'user_roles.xlsx');
    	}
    	else{

    	}
    	}
    		
    	} catch (Exception $e) {
    		dd($e);
    	}
    	
    	
    }
}
