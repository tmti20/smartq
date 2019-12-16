<?php
	session_start();
	//if ( ! $_SESSION["authenticated"])
        {
               // header("Location: logout.php");
        }
?>
<form class="login100-form validate-form" method="post" action="service.php">

<?php
//HTML HEADER FILE AND GET VALUES FORM PREVIOUS FILE
include "header.php";
$username = $_SESSION["username"];
$location = $_POST['location'];
$_SESSION["location"] = $location;
//echo $username;
?>
<!--    SITE HEADLINE-->
    <span class="login100-form-title p-b-34 p-t-27">
        Pick Your Store
    </span>
    <?php
//STORE MENU

	require_once('./client/path.inc');
	require_once('./client/get_host_info.inc');
	require_once('./client/rabbitMQLib.inc');

	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
	$req = array("type"=>"store","location"=>$location);
	$datas = $client->send_request($req);
	//print_r($datas);
	echo "<select  name=\"store\">";
	foreach ($datas as $data){
	echo "<option value = \"$data\">";
	echo " $data <br>";
	echo "</option>";
	echo "<br>";
	}
	echo "</select>";


    ?>
<!--    NEXT BUTTON-->
    <div class="container-login100-form-btn">
    <button class="login100-form-btn" type="submit" > Next </button>
    </div>

<!--    LOGOUT BUTTON-->
    <div class="text-center p-t-90">
        <a class="login100-form-btn" href="logout.php">
            LOGOUT
        </a>
</form>
<?php include "footer.php"; ?>
