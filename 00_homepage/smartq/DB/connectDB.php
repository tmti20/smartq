<?php

error_reporting(E_ERROR | E_Warning | E_PARSE | E_NOTICE);
ini_set( 'display_errors', 1);
$hostname = "localhost" ;
$DBusername = "myuser" ;
$project = "test" ;
$DBpassword = "mypass" ;
//CONNECT to MySQL
$db = mysqli_connect($hostname,$DBusername, $DBpassword ,$project);
if (mysqli_connect_errno()) {
    print "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
