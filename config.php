<?php

//DATABASE VARIABLES
$DB 		= "bookdrea_dreamvoyage";
$USER 		= "bookdrea_dreamvoyage2024";
$PASSWORD 	= "Dreamvoyage2024";
$HOST 		= "localhost";


//DATABASE CONNECTION
function dbConnect()
{
	global $DB,$HOST,$USER,$PASSWORD,$con;
	$con = mysqli_connect($HOST,$USER,$PASSWORD,$DB) or die("Could not connect to MySQL database");
//	mysql_select_db($DB) or die("Could not select database");
}
?>