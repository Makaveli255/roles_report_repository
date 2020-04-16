<?php

return [

	//Option 1 => if use users table with intermidiate table of role_users
	'startHead' => [
        'head' => 'opt-one'
	],

	//if use users table with no intemediary role user table
	// 'startHead' => [
 //        'head' => 'opt-two'
	// ],

	'usersTable' => [
		'tablename' => 'main.users',
		'userIdColumn' => 'id',
		'firstnameColumn' => 'firstname',
		'middlenameColumn' => 'middlename',
		'lastnameColumn' =>'lastname',
		'deptIdColumn' => 'unit_id',
		'roleIdColumn' => 'role_id', //left blank if use option 2
	],
	'rolesTable'=> [
		'roleIdColumn' => 'id',
		'tablename' => 'main.roles',
		'nameColumn' => 'name',
	],
	'deptTable'=> [
		'deptIdColumn' => 'id',
		'tablename' => 'main.units',
		'nameColumn' => 'name',
	],
	'userRoleTable' =>[
        'tablename' => 'main.role_user',
		'userIdColumn' => 'user_id',
		'roleIdColumn' => 'role_id',
	]
	
   
];