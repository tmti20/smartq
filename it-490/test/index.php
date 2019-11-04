<?php
include ("account.php") ;

$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: ".mysqli_connect_error();
exit();
}

print("<br>Successfully connected to MySQL.<br>");

mysqli_close($db);
exit("<br>Interaction complete.<br><br>");

?>
