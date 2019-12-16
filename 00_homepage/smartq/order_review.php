<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
        {
                header("Location: logout.php");
        }
?>
<form  method="post" action="order_confirm.php">
<?php
//        HTML HEADER FILE AND GET VALUES FORM PREVIOUS FILE
    include("header.php");
    $username = $_SESSION["username"];
    $location = $_SESSION["location"];
    $store = $_SESSION["store"];
    $service = $_POST["service"];
    $_SESSION["service"] = $service;
	
?>
<!--            PAGE HEADLINE-->
<span class="login100-form-title p-b-34 p-t-27">
    Order Review
</span>

<!--            PRINT ORDER REVIEW-->
<?php
    //include("DB/connectDB.php");
	// ------------------------- Getting service Time -----------------------------------------
	require_once('./client/path.inc');
	require_once('./client/get_host_info.inc');
	require_once('./client/rabbitMQLib.inc');

	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
	$req = array("type"=>"stime","service"=>$service,"store"=>$store,"location"=>$location);
	$datas = $client->send_request($req);
	$servicetime = $datas[0];	
	$position = $datas[1];
	$queueduration = $datas[2];
	$_SESSION["position"] = $position;

	/*/echo $servicetime;
	print_r($datas);
	// ------------------------- wait Time  -----------------------------------------
	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
	$req = array("type"=>"wtime","store"=>$store);
	$servicetime = $client->send_request($req);
	$s3 = "select  sum(queueduration)  from queue where storename = '$store' and location = '$location'";
	$t3 = mysqli_query( $db,  $s3 )  or die( mysqli_error($db) ); #executes the sql statement
	//$r3 = mysqli_fetch_array($t3,MYSQLI_ASSOC);
	$num = mysqli_num_rows($t3);
	$position = $num +1;
	$_SESSION["position"] = $position;
	while ($r3 = mysqli_fetch_array($t3,MYSQLI_ASSOC)){
	    $queueduration = $r3['queueduration'] + $queueduration;
	}
	$_SESSION["queueduration"] = $queueduration; */

    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
        Client Email: <h5 > $username </h5><br>
        Store Location:<h5> $location </h5><br>
        Store Name:<h5> $store </h5><br>
        Service:<h5> $service </h5><br>
	Service Time:<h5> $queueduration Min </h5><br>
	Position:<h5> $position </h5><br>
      </span> ";
	$queueduration = $servicetime + $queueduration;
	$_SESSION["queueduration"] = $queueduration;
?>


<!--            CONFIM ORDER BUTTON-->
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Confirm Order
        </button>
    </div>
</form>

<!--        LOGOUT BUTTON-->
<div class="text-center p-t-90">
    <a class="login100-form-btn" href="logout.php">
        LOGOUT
    </a>
</div>
<!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>

