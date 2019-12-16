<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
        {
                header("Location: logout.php");
        }
?>
<?php include("header.php"); ?>
    <span class="login100-form-title p-b-34 p-t-27">
    Order Confirm
    </span>

<?php
    include("DB/connectDB.php");
    $username = $_SESSION["username"];
    $location = $_SESSION["location"];
    $store = $_SESSION["store"];
    $service = $_SESSION["service"];
    $queueposition = $_SESSION["position"];
    $queueduration = $_SESSION["queueduration"];

/*/---------------------calculate wait time---------------------------------------
if($service == 'Full Service Wash'){
	$queueduration = '10';
}elseif($service == 'Super Wash'){
	$queueduration = '20';
}elseif($service == 'Super Polyprocess'){
	$queueduration = '30';
}elseif($service == 'Super Polish'){
	$queueduration = '25';
}elseif($service == 'All in One'){
	$queueduration = '45';
}*/	

// ------------------------- getting user id-----------------------------------------
$s1 = "select * from users where email = '$username'";
$t1 = mysqli_query( $db,  $s1 )  or die( mysqli_error($db) ); #executes the sql statement
while ($r1 = mysqli_fetch_array($t1,MYSQLI_ASSOC)){
$userid = $r1["userid"];
}
    //echo "<br><h3> Hey $email,  <br> Your userid : $userid </h3>";

// ------------------------- getting Merchant id-----------------------------------------
$s2 = "select merchantid from business where storename = '$store'";
$t2 = mysqli_query( $db,  $s2 )  or die( mysqli_error($db) ); #executes the sql statement
$r2 = mysqli_fetch_array($t2,MYSQLI_ASSOC);
$merchantid = $r2['merchantid'];
    //echo "<br><h3> Storename: $store,  <br> Your userid : $merchantid </h3>";

// ------------------------- getting service Time -----------------------------------------
$s3 = "select * from service where servicename = '$service'";
$t3 = mysqli_query( $db,  $s3 )  or die( mysqli_error($db) ); #executes the sql statement
$r3 = mysqli_fetch_array($t3,MYSQLI_ASSOC);
$servicetime = $r3['servicetime'];
    echo "<br><h3> $servicetime </h3>";

/*/ ------------------------- getting service Time -----------------------------------------
$s3 = "select * from queue where merchantid = '$merchantid'";
$t3 = mysqli_query( $db,  $s3 )  or die( mysqli_error($db) ); #executes the sql statement
$r3 = mysqli_fetch_array($t3,MYSQLI_ASSOC);
$num = mysqli_num_rows($t3);
$servicetime = $r3['servicetime'];
    echo "<br><h3> $servicetime </h3>"; */



// ------------------------- data enter for queue table-----------------------------------------
$s3 = "insert into queue (userid, merchantid,username,storename,queueduration,queuetime, location,queueposition) values ('$userid','$merchantid','$username','$store','$queueduration', NOW(),'$location','$queueposition' )";
$t3 = mysqli_query( $db,  $s3 )  or die( mysqli_error($db) ); #executes the sql statement
    echo "<br><br><h5> Hey $username, Your Order is Confirm! <br> Your queue Positoin : $queueposition </h5>"; 

// ------------------------------------------------------------------
$s4 = "select * from queue where userid = '$userid' and merchantid = '$merchantid' " ;
($t4 = mysqli_query($db, $s4)) or die(mysqli_error($db));
while ($r4 = mysqli_fetch_array($t4,MYSQLI_ASSOC)){
    //$orderstatus = $r["orderstatus"];
    $orderid = $r4['queueid'];
}

echo "<br><h5>Order ID: $orderid </h5>";
?>
<!--add order button here
    <div class="text-center p-t-90">
        <a class="login100-form-btn" methode= "get" href="location.php?username =<?php echo $email ?> " >
            ADD Order
        </a>
    </div>   
-->
<!--LOGOUT BUTTON HERE-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
    </div>
    <!----------------------- Footer HTML code here ----------------------->
<?php include("footer.php"); ?>
