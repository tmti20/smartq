<?php
	session_start();
	if ( ! $_SESSION["authenticated"])
	{
		//echo "no session";		
		header("Location: logout.php");	
	}
?>
<form class="login100-form validate-form" method="post" action="store.php">

<!--    Get user valu from login.php page and HTML header.php file is here below-->
<?php
//$username = $_GET['username'];
//$_SESSION["username"] = $username;
//$username = $_SESSION["username"];
//include "header.php";
//echo " $username";
?>






<!--    Here is the headline test-->
    <span class="login100-form-title p-b-34 p-t-27">
        Pick Your Location
    </span>

<!--LOCATION MENU START HERE-->
<?php
	$username = $_SESSION["username"];
	include "header.php";

	require_once('./client/path.inc');
	require_once('./client/get_host_info.inc');
	require_once('./client/rabbitMQLib.inc');

	$type = $_GET['type'];

	if($type=="location"){
	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
	$req = array("type"=>$type,"username"=>$username);
	$datas = $client->send_request($req);
	//print_r($datas);
	echo "<select  name=\"location\">";
	foreach ($datas as $data){
	echo "<option value = \"$data\">";
	echo " $data <br>";
	echo "</option>";
	echo "<br>";
	}
	echo "</select>";
}
    /*/include("DB/connectDB.php");

   	$s = "select distinct location from business ";
    	($t = mysqli_query($db, $s)) or die(mysqli_error($db));

    //MENU
    echo "<select  name=\"location\">";
    //OPTIONS
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $location = $r["location"];

        echo "<option value = \"$location\">";
        echo "$location ";
        echo "</option>";
        echo "<br>";
    }
    echo "</select>";
//    LOCATION MENU END HERE */
    ?>

<!--NEXT BUTTON TO GO TO STORE.PHP FILE-->
    <div class="container-login100-form-btn">
    	<button class="login100-form-btn" type="submit" > Next </button>
    </div>

</form>

<!--LOGOUT BUTTON-->
<div class="text-center p-t-90">
    <a class="login100-form-btn" href="logout.php">
        LOGOUT
    </a>
</div>

<?php include "footer.php"; ?>
