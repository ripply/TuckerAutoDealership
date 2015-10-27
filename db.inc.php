<?php

/*
* db.inc.php
*
* db Connection script
*
*/

try {
	// set up db connection
	global $db;
	$dbhost="HOST";
	$dbuser="USERNAME";
	$dbpass="PASSWORD";
	$dbname="DBNAME";
	$db = new PDO("mysql:host=$dbhost;dbname=$dbname," $dbuser, $dbpass);
	//error handler
	$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// charset to utf8
	$db -> exec("SET CHARACTER SET utf8");

} catch (PDOException $e) {
	echo $e -> getMessage();
	exit();
}

?>
