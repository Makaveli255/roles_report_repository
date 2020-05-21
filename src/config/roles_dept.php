<?php

return [

	//Option 1 => if use users table with intermidiate table of role_users
	// 'startHead' => [
 //        'head' => 'opt-one'
	// ],

	//if use users table with no intemediary role user table
	// 'startHead' => [
 //        'head' => 'opt-two'
	// ],

	//Option 3 => if use users table with intermidiate table of role_permission
	'startHeads' => [
        'heads' => 'opt-three'
	],

	'usersTables' => [
		'tablename' => 'users_test',
		'userIdColumn' => 'id',
		'firstnameColumn' => 'firstname',
		'middlenameColumn' => 'middlename',
		'lastnameColumn' =>'lastname',
		'deptIdColumn' => 'unit_id',
		'roleIdColumn' => 'role_id', //left blank if use option 2
	],
	'rolesTable'=> [
		'roleIdColumn' => 'id',
		'tablename' => 'roles',
		'nameColumn' => 'name',
	],
	'deptTable'=> [
		'deptIdColumn' => 'id',
		'tablename' => 'units',
		'nameColumn' => 'name',
	],
	'userRoleTable' =>[
        'tablename' => 'role_user',
		'userIdColumn' => 'user_id',
		'roleIdColumn' => 'role_id',
	],

	'permissionTable' =>[
        'tablename' => 'permissions',
		'permisionIdColumn' => 'id',
		'labelColumn' => 'label',
	],

	'rolePermissionTable' =>[
        'tablename' => 'role_permissions',
		'permissionIdColumn' => 'permission_id',
		'roleIdColumn' => 'role_id',
	]
	
   
];