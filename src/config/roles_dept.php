<?php

return [
	'usersTable' => [
		'tablename' => 'main.users',
		'userIdColumn' => 'id',
		'firstnameColumn' => 'firstname',
		'middlenameColumn' => 'middlename',
		'lastnameColumn' =>'lastname',
		'deptIdColumn' => 'unit_id',
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