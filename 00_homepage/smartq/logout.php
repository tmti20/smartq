<?php
	session_start();
	session_destroy();
?>
<?php include ("header.php");?>

<span class="login100-form-title p-b-34 p-t-27">
    
Logged Out !! Thank You for using our app.
</span>

<br><br>

<div class="container-login100-form-btn">
    <a class="login100-form-btn" href="../index.php" role="button">Login again</a><br><br>
</div>

<?php include ("footer.php");?>
