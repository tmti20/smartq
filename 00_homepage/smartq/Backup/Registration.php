<?php
   session_set_cookie_params ( 0, "/~mj342/");
   session_start();
?>

<?php

print "<b>Hii There</b>" ;

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

//include (  "hwfunctions.php"  ) ; #including the file name

include("account.php");
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br><b>SUCCESSFULLY CONNECTED to MySQL.</b><br>";
mysqli_select_db( $db, $project );

$user = $_GET["username"];
$email = $_GET[ "email" ];
$pass = $_GET[ "password" ];
$confirm = $_GET["confirm"];
$delay = 5;

echo "<br><b>delay :</b> $delay secs";

if ($pass == $confirm) {
  $password = $pass;
  
  $sql_insert = "insert into wt_registration values ('$user', '$password', '$email' )";
  $output = "<br> SQL statement: $sql_insert<br>";
  print $output;
  print $user;
  print $email;
  print $password;
  
  $t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
}

?>
