<?php
include ("header.php");
include ("DB/connectDB.php");
$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'password' );

$sql_insert = "insert into wt_registration (username, userpass, email) values ('$user','$pass','$email' )";
  echo "
        <span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> WELCOME $user</h1><br>
        </span>";

  echo "<br>Registration Successful. Please Log in !<br><br>
  <div class=\"container-login100-form-btn\">
      <br><a class=\"login100-form-btn\" href=\"login_form.php\">LOG IN</a><br><br>
  </div>";
  $t1 = mysqli_query( $db,  $sql_insert )  or die( mysqli_error($db) ); #executes the sql statement
?>
<?php include ("footer.php");?>
