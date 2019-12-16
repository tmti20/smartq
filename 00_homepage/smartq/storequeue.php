<style>
h5 {
  border-style: double;
}


</style>
<?php
session_start();
//$_SESSION["authenticated"] = False;
//HTML header code in this header.php file
//include ("header.php");

//connect database with this connectDB.php file
include ("DB/connectDB.php");

//Get values form login_form.php file
//$username = $_GET['username'];
$username = $_SESSION["username"];
//echo $username;
//echo "this is test";
//$pass = filter_input(INPUT_POST, 'password' );
//$_SESSION["password"] = $pass;

/*
//user log in authentication query
$s ="select * from wt_registration where username='$username' and userpass= '$pass'";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);

if ($num == 0){
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> Wrong Username or Password</h1><br>
          </span>";

//    Try again button when login fails
    echo "<br><br>
        <div class=\"container-login100-form-btn\">
            <br><a class=\"login100-form-btn\" href=\"login_form.php\">TRY AGAIN</a><br><br>
        </div>";
    exit();
}
else {
	$_SESSION["authenticated"] = True;
    echo "<span class=\"login100-form-title p-b-34 p-t-27\">
            <br><h1> WELCOME $username</h1><br>
          </span>"; 

*/


// ------------------------- getting merchant id-----------------------------------------
$s1 = "select * from business where email = '$username'";
$t1 = mysqli_query( $db,  $s1 )  or die( mysqli_error($db) ); #executes the sql statement
while ($r1 = mysqli_fetch_array($t1,MYSQLI_ASSOC)){
$merchantid = $r1["merchantid"];

}

//echo "$userid";

//Active orders are here
$s = "select * from queue where merchantid = '$merchantid' ";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
$num = mysqli_num_rows($t);
if ($num == 0) {
    echo "You don't have Any Active Orders";
	
} 
else { $num = 1; $servicetime = 0;
    while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
        $orderid = $r["queueid"];
        $username = $r["username"];
	$servicetime = $r["queueduration"] + $servicetime;
        //$_SESSION['queue'] = $orderid;

//            printing active order here
        echo "<h5> 
		 
		<br > Order ID: $orderid
		<br>Customer: $username
		<br>Position $num
		<br> Service Time: $servicetime min <br><br>";
		
		$num = $num + 1;
//        button for placing order
	echo " <a class=\"login100-form-btn\" onclick=\"delete()\">EDIT</a>";
	echo " <a class=\"text-center p-t-90\" href=\"../deletequeuestore.php?queueid= $orderid\">DELETE</a><br></h5>";

    }

    }

?>
<?php //include ("footer.php");?>
