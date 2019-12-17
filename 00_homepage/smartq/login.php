
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


$num = count($datas);
//print_r($datas);


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



$count=1;
foreach($datas as $value){
  if (($count % 5)== 1) {
  echo "Order ID: $value<br>";
  }
  elseif (($count % 5) == 2) {
  echo "Store Name: $value<br>";
  }  
  elseif (($count %5) == 3) {
  echo "Location: $value<br>";
  }  
  elseif (($count %5) == 4) {
  echo "Position: $value<br>";
  }  
  else{
  echo "Serving Time: $value<br><br><br>";
  }  
echo "<br><br>\n";

  $count=$count+1;
  
}
    
/*/            printing active order here
        echo " <br>Order ID: $orderid<br>";
        echo " <br>Store Name: $storename<br>";
	echo " <br>Location: $location<br><br>";
	echo " <br>Position: $position<br><br>";
	echo " <br>Serving Time: $queueduration Min<br><br>\n";  */


//        button for placing order
	echo "  <br><br>
        	<div class=\"container-login100-form-btn\">
            	<br><a class=\"login100-form-btn\" href=\"location.php?type=location\">PLACE ORDER</a><br><br>
        	</div>"; 
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
