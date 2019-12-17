
<?php
session_start();
//$_SESSION["authenticated"] = False;
//HTML header code in this header.php file
include ("header.php");

//connect database with this connectDB.php file
//include ("DB/connectDB.php");

//Get values form login_form.php file
$username = $_GET['username'];
$_SESSION["username"] = $username;
require_once('./client/path.inc');
require_once('./client/get_host_info.inc');
require_once('./client/rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$req = array("type"=>"home","username"=>$username);
$datas = $client->send_request($req);
//echo count($datas);
//print_r($datas);
//foreach ($datas as $data){echo " $data <br>";}
$num = $datas[5];
$orderid = $datas[0];
$storename = $datas[1];
$location = $datas[2];
$queueduration = $datas[3];
$position = $datas[4];

//Active orders are here

if ($num == 0) {
    echo "You don have Any Active Orders";

//        Place order button here
	echo "            
       		<br><br>
       		<div class=\"container-login100-form-btn\">
            	<br><a class=\"login100-form-btn\" methods='post' href=\"location.php?type=location\">PLACE ORDER</a><br><br>
       		</div>";
		
} 
else { 
    
//            printing active order here
        echo " <br>Order ID: $orderid<br>";
        echo " <br>Store Name: $storename<br>";
	echo " <br>Location: $location<br><br>";
	echo " <br>Position: $position<br><br>";
	echo " <br>Serving Time: $queueduration Min<br><br>\n";


/*/        button for placing order
	echo "  <br><br>
        	<div class=\"container-login100-form-btn\">
            	<br><a class=\"login100-form-btn\" href=\"location.php?type=location\">PLACE ORDER</a><br><br>
        	</div>"; */
    }
//    logout button
echo " \n
	<br><br>
	<div class=\"text-center p-t-90\">
    	<a class=\"login100-form-btn\" href=\"logout.php\">
        	LOGOUT
    	</a>
	</div>";

?>
<?php include ("footer.php");?>
