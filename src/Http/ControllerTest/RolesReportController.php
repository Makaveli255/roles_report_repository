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
        // dd(config('roles_dept.startHeads.heads'));

        try {
            if (config('roles_dept.startHeads.heads') == "opt-one" && config('roles_dept.startHeads.heads') == "opt-two" && config('roles_dept.startHeads.heads') == "opt-three") {

        }else{
            if (config('roles_dept.startHeads.heads') == "opt-one") {
        $users = DB::table(config('roles_dept.usersTables.tablename'))
        ->select(config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.userIdColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),config('roles_dept.usersTables.firstnameColumn'),config('roles_dept.usersTables.middlenameColumn'),config('roles_dept.usersTables.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn').' as deptname',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn').' as rolename')
        ->leftJoin(config('roles_dept.userRoleTable.tablename'),config('roles_dept.userRoleTable.tablename').'.'.config('roles_dept.userRoleTable.userIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.userIdColumn'))
        ->leftJoin(config('roles_dept.rolesTable.tablename'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'),'=',config('roles_dept.userRoleTable.tablename').'.'.config('roles_dept.userRoleTable.roleIdColumn'))
        ->leftJoin(config('roles_dept.deptTable.tablename'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.deptIdColumn'))
        ->get();
        // return $users;
        return Excel::download(new RolesExports((object)$users),'user_roles.xlsx');
        }elseif (config('roles_dept.startHeads.heads') == "opt-two") {
        $users = DB::table(config('roles_dept.usersTables.tablename'))
        ->select(config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.userIdColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),config('roles_dept.usersTables.firstnameColumn'),config('roles_dept.usersTables.middlenameColumn'),config('roles_dept.usersTables.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn').' as deptname',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn').' as rolename',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'))
        ->leftJoin(config('roles_dept.rolesTable.tablename'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.userRoleTable.roleIdColumn'))
        ->leftJoin(config('roles_dept.deptTable.tablename'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.deptIdColumn'))
        ->get();
        // return (object)$users;
        return Excel::download(new RolesExports((object)$users),'user_roles.xlsx');
        }
        elseif(config('roles_dept.startHeads.heads') == "opt-three"){
        $users = DB::table(config('roles_dept.usersTables.tablename'))
        ->select(config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.userIdColumn').' as userId',config('roles_dept.usersTables.firstnameColumn'),config('roles_dept.usersTables.middlenameColumn'),config('roles_dept.usersTables.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn').' as deptname',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn').' as rolename',DB::raw('CONCAT('.config('roles_dept.permissionTable.tablename').'.'.config('roles_dept.permissionTable.labelColumn').') as label'))
        ->leftJoin(config('roles_dept.rolesTable.tablename'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.roleIdColumn'))
        ->leftJoin(config('roles_dept.deptTable.tablename'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.deptIdColumn'),'=',config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.deptIdColumn'))
        ->leftJoin(config('roles_dept.rolePermissionTable.tablename'),config('roles_dept.rolePermissionTable.tablename').'.'.config('roles_dept.rolePermissionTable.roleIdColumn'),'=',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'))
        ->leftJoin(config('roles_dept.permissionTable.tablename'),config('roles_dept.permissionTable.tablename').'.'.config('roles_dept.permissionTable.permisionIdColumn'),'=',config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.roleIdColumn'))
        ->groupBy(config('roles_dept.usersTables.tablename').'.'.config('roles_dept.usersTables.userIdColumn'),config('roles_dept.usersTables.firstnameColumn'),config('roles_dept.usersTables.middlenameColumn'),config('roles_dept.usersTables.lastnameColumn'),config('roles_dept.deptTable.tablename').'.'.config('roles_dept.deptTable.nameColumn'),config('roles_dept.rolesTable.tablename').'.'.config('roles_dept.rolesTable.nameColumn'),config('roles_dept.permissionTable.tablename').'.'.config('roles_dept.permissionTable.labelColumn'))
        ->get();
        // return $users;
        return Excel::download(new RolesExports((object)$users),'user_roles.xlsx');
        }else{

        }
        }
            
        } catch (Exception $e) {
            dd($e);
        }
        
        
    }
}
