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
    //$barber = $_SESSION["barber"];
    $service = $_POST["service"];
    $_SESSION["service"] = $service;
	$test = $_POST['price'];
echo $test;
?>
<!--            PAGE HEADLINE-->
<span class="login100-form-title p-b-34 p-t-27">
    Order Review
</span>

<!--            PRINT ORDER REVIEW-->
<?php
    include("DB/connectDB.php");
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
        Client Email: <h5 > $username </h5><br>
        Store Location:<h5> $location </h5><br>
        Store Name:<h5> $store </h5><br>
        Service:<h5> $service </h5><br>
	Price:<h5> $service </h5><br>
      </span> "
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

