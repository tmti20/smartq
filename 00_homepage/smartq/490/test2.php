<?php
include("connectDB.php");
$queueid = $_POST['queue'];
//$merchantid = $_POST['merchant'];
echo $queueid;
//echo  $merchantid;

$s= "DELETE FROM queue WHERE queueid = '$queueid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

echo"<br>done";
header("Location: test.php");
?>