<style>
h5 {
  border-style: double;
}


</style>
<?php
session_start();
require_once('./client/path.inc');
require_once('./client/get_host_info.inc');
require_once('./client/rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$req = array("type"=>"home","username"=>$username);
$datas = $client->send_request($req);

//connect database with this connectDB.php file
//include ("DB/connectDB.php");

//Get values form login_form.php file
//$username = $_GET['username'];
$username = $_SESSION["username"];

// ------------------------- getting merchant id-----------------------------------------
$s1 = "select * from business where email = '$username'";
$t1 = mysqli_query( $db,  $s1 )  or die( mysqli_error($db) ); #executes the sql statement
while ($r1 = mysqli_fetch_array($t1,MYSQLI_ASSOC)){
$merchantid = $r1["merchantid"];
}

//echo "$userid";

//Active orders are here
$s = "select * from queue where merchantid = '$merchantid' ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";
	
} 
else { $num = 1; $servicetime = 0;
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $orderid = $r["queueid"];
        $username = $r["username"];
	$servicetime = $r["queueduration"] + $servicetime;
        //$_SESSION['queue'] = $orderid;

//            printing active order here
        echo "<h5> 
		 
		<br > Order ID: $orderid
		<br>Customer: $username
		<br>Position $num
		<br> Service Time: $servicetime min <br><br>";
		
		$num = $num + 1;
//        button for placing order
	echo " <a class=\"login100-form-btn\" onclick=\"delete()\">EDIT</a>";
	echo " <a class=\"text-center p-t-90\" href=\"../deletequeuestore.php?queueid= $orderid\">DELETE</a><br></h5>";

    }

    }

?>
<?php //include ("footer.php");?>
