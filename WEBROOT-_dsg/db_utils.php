<?php
////////////////////////////////////////////////////////////////
//	File:	public_html/secure/db_utils.php
//
//	Author:	eamohl@leadsanddata.net
//
//	Date:	03 June 2013
//
//	Description:
//		Some very basic helper functions for database access
////////////////////////////////////////////////////////////////

// Absolute path to the database configuation file
define ('DB_CONFIG_FILE', '/home/cashmone/public_html/secure/_dsg/db_config.ini');

// Default configuration file section to load
define ('DB_CONFIG_SECTION', 'default');

function db_get_default_config()
{
	$config = parse_ini_file(DB_CONFIG_FILE, TRUE);
	
	$_config = $config[DB_CONFIG_SECTION];
	
	return $_config;
}

function db_connect()
{
	$config = db_get_default_config();
	
	$dsn = $config['dsn'];
	$username = $config['username'];
	$password = $config['password'];
	
	$dbh = NULL;
	
	try {
		$dbh = new PDO($dsn, $username, $password);
	} catch (Exception $e) {
		echo $e->getMessage();
		die;
	}
	
	return $dbh;
}

?>