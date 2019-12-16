
<?php
session_start();
include("DB/connectDB.php");
$queueid = $_GET['queueid'];
echo $queueid;
$username = $_SESSION["username"];
$s= "DELETE FROM queue WHERE queueid = '$queueid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//$s1= "update queue set  WHERE queueid = '$queueid'";
//($t1 = mysqli_query($db, $s1)) or die(mysqli_error($db));
echo"<br>done";
header("Location: Dash/dashboard.php?username=$username");
?>
