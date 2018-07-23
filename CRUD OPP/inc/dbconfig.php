<?php
define('DB_SERVER','localhost');
define('DB_USER','zcmoreno');
define('DB_PASSWORD','Zmfdl101');
define('DB_NAME','zcmoreno');

class DB_con
//the handles the database and the server configuration with phpmyadmin to connect to our existing database. 
//By using the DB_con class it will work with all our files
{
	function __construct()
	{
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('error connecting to server'.mysql_error());
		mysql_select_db(DB_NAME, $conn) or die('error connecting to database->'.mysql_error());
	}
}

?>