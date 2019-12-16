<?php
	session_start();
	//if ( ! $_SESSION["authenticated"])
        {
            //    header("Location: waitlister.php");
        }
?>
<form class="login100-form validate-form" method="post" action="order_review.php">

<?php
include "header.php";
$store = $_POST["store"];
$_SESSION["store"] = $store;
$username = $_SESSION["username"];
$location = $_SESSION["location"];
//$store = $_SESSION["store"];
//$barber = $_POST["barber"];
//$_SESSION = $barber;
 ?>
<!--        SERVICE PAGE HEADLINE HERE-->
    <span class="login100-form-title p-b-34 p-t-27">
        CHOOSE SERVICE
    </span>
<!--         SERVICE MENU HERE-->
<?php



	require_once('./client/path.inc');
	require_once('./client/get_host_info.inc');
	require_once('./client/rabbitMQLib.inc');

	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
	$req = array("type"=>"service");
	$datas = $client->send_request($req);
	//print_r($datas);
	echo "<select  name=\"service\">";
	foreach ($datas as $data){
	echo "<option value = \"$data\">";
	echo " $data <br>";
	echo "</option>";
	echo "<br>";
	}
	echo "</select>";



/*

include("DB/connectDB.php");
$s = "select * from service ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

echo "<select  name=\"service\" >";
while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
    $service = $r["servicename"];
    $price = $r ["price"];

    echo "<option value = \"$service\">";
    echo "$service : ";
    echo " $$price ";
    echo "</option>";
    echo "<br>";
}
////END THE MENU
echo "</select>"; */
?>
<!--//NEXT BUTTON-->
    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit" > Next </button>
    </div>

<!--        LOGOUT BUTTON-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
</form>
<?php include "footer.php"; ?>
