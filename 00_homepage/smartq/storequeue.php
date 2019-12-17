<style>
h5 {
  border-style: double;
}

</style>
<?php
session_start();
require_once('../client/path.inc');
require_once('../client/get_host_info.inc');
require_once('../client/rabbitMQLib.inc');
$username = $_SESSION["username"];
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$req = array("type"=>"squeue","email"=>$username);
$datas = $client->send_request($req);
$num = count($datas);
$count=1;
foreach($datas as $value){ //echo "<h5>";
  if (($count % 5)== 1) { echo "<br><h5></h5>";
  echo "Order ID: $value<br>";
echo " <a class=\"text-center p-t-90\" href=\"../deletequeuestore.php?queueid=$value\">DELETE</a><br></h5>";
  }
  elseif (($count % 5) == 2) {
  echo "Customer Name: $value<br>";
  }  
  elseif (($count %5) == 3) {
  echo "Location: $value<br>";
  }  
  elseif (($count %5) == 4) {
  echo "Position: $value<br>";
  }  
  else{
  echo "Serving Time: $value<br>";

  }  

  $count=$count+1; }
 // echo "<br>888888888888888;";
/*/ ------------------------- getting merchant id-----------------------------------------
$s1 = "select * from business where email = '$username'";
$t1 = mysqli_query( $db,  $s1 )  or die( mysqli_error($db) ); #executes the sql statement
while ($r1 = mysqli_fetch_array($t1,MYSQLI_ASSOC)){
$merchantid = $r1["merchantid"];
}

//echo "$userid";

//Active orders are here
$s = "select * from queue where store = '$merchantid' ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";
	
} 
else {



}*/
    
/* $num = 1; $servicetime = 0;
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

    } */

   // }

?>
<?php //include ("footer.php");?>
