<?php
include ("header.php");
include ("DB/connectDB.php");
$storename = filter_input(INPUT_POST, 'storename', FILTER_SANITIZE_STRING);
$storeemail = filter_input(INPUT_POST, 'storeemail', FILTER_SANITIZE_EMAIL);
$storepass = filter_input(INPUT_POST, 'storepass');
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip');

$sql_insert = "insert into wt_store (storename, city, zip,storepass, storeemail) values ('$storename','$city','$zip', '$storepass', '$storeemail')";
echo "<br> Congratulation! You have successfully register your store to Waitlister System.<br>";
$t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
?>
    <br><br>
    <div class="container-login100-form-btn">
        <br><a class="login100-form-btn" href="barber_registration_form.php?storename=<?php echo $storename ?>" role="button">Add Barber</a><br><br>
        <a class="login100-form-btn" href="Dash/dashboard.html" role="button">Dashboard</a><br>
    </div>
<!--LOGOUT BUTTON-->
    <div class="text-center p-t-90">
        <a class="txt1" href="store_login_form.php">
            LOGOUT
        </a>
    </div>
<?php include ("footer.php");?>