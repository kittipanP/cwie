<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'Kp5610761!');
	define('DBNAME', 'cwie_db');
	
	$link = mysqli_connect(DBHOST,DBUSER,DBPASS, DBNAME);
	
	
	if ( !$link ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$link ) {
		die("Database Connection failed : " . mysql_error());
	}