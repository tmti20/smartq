
<?php
session_start();
//include("DB/connectDB.php");
$queueid = $_GET['queueid'];
$semail = $_SESSION["username"];

require_once('./client/path.inc');
require_once('./client/get_host_info.inc');
require_once('./client/rabbitMQLib.inc');
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$req = array("type"=>"qdelete","queueid"=>$queueid);
$datas = $client->send_request($req);

/*
$s= "DELETE FROM queue WHERE queueid = '$queueid'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//$s1= "update queue set  WHERE queueid = '$queueid'";
//($t1 = mysqli_query($db, $s1)) or die(mysqli_error($db));
echo"<br>done";*/
header("Location: Dash/dashboard.php?username=$semail"); 

?>
