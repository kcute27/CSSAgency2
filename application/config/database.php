<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default3';
$query_builder = TRUE;


$db['default'] = array(
	'dsn'	=> 'www.calauitsafari.com',
	'hostname' => 'www.calauitsafari.com',
	'username' => 'calauits_user_db',
	'password' => 'O}QJgqNQHMdF',
	'database' => 'calauits_db',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$db['default2'] = array(
'dsn' => '',
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'cssdb',
'dbdriver' => 'mysqli',
'dbprefix' => '',
'pconnect' => FALSE,
'db_debug' => (ENVIRONMENT !== 'production'),
'cache_on' => FALSE,
'cachedir' => '',
'char_set' => 'utf8',
'dbcollat' => 'utf8_general_ci',
'swap_pre' => '',
'encrypt' => FALSE,
'compress' => FALSE,
'stricton' => FALSE,
'failover' => array(),
'save_queries' => TRUE
);

$db['default3'] = array(
	'dsn'	=> '35.194.231.228',
	'hostname' => '35.194.231.228',
	'username' => 'css_user',
	'password' => '9KAGOlgEbi5genLI',
	'database' => 'calauits_db',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);