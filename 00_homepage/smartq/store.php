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
    include("DB/connectDB.php");
    $s = "select distinct storename from business where location = '$location'";
    ($t = mysqli_query($db, $s)) or die(mysqli_error($db));

    echo "<select  name=\"store\">";
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $store = $r["storename"];
        echo "<option value = \"$store\">";
        echo "$store ";
        echo "</option>";
        echo "<br>";
    }

    //End STORE MENU
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
