<?php

return [
		
		'connections' => [
				
		'mysql' => array(
				'driver'    => 'mysql',
				'host'      => '127.0.0.1',
				'database'  => 'homestead',
				'username'  => 'homestead',
				'password'  => 'secret',
				'charset'   => 'utf8',
				'collation' => 'utf8_unicode_ci',
				'prefix'    => '',
				'port'      => '3306'
		),
]
];



// 'mysql' => array(
// 		'driver'    => 'mysql',
// 		'host'      => getenv('DB_HOST'),
// 		'database'  => getenv('DB_NAME'),
// 		'username'  => getenv('DB_USER'),
// 		'password'  => getenv('DB_PASSWORD'),
// 		'charset'   => 'utf8',
// 		'collation' => 'utf8_unicode_ci',
// 		'prefix'    => '',
// 		'port'      => ''
// ),
