<?php

return [
  'fetch' => PDO::FETCH_CLASS,
  'default' => 'mongodb',
  'connections' => [
    'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'synergixe',
            'username'  => '',
            'password'  => ''
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
    ],
		'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => 'localhost',
            'port'     => 27017,
            'username' => '',
            'password' => '',
            'database' => 'll_staging' // Default name (removing this makes Travis fail).
    ],
	],
	'migrations' => 'migrations',
];
