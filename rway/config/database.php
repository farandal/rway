<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'mysql.brandweb.cl',
			'username'   => 'bwcl',
			'password'   => '1q2w3e4r..!',
			'persistent' => FALSE,
			'database'   => 'farandal_rightway',
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
        'caching'      => FALSE,
        'profiling'    => TRUE,
	)
	
);

