<?php
include("connectDB.php");
$queueid = $_POST['queue'];

echo $queueid;


$s= "DELETE FROM queue WHERE queueid = '$queueid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

echo"<br>done";
header("Location: queuedelete_form.php");
?>