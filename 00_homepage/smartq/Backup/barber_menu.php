
<?php
include("DB/connectDB.php");
//MENU.PHP

//$s = "select * from wt_barber where storename = '$store' " ;
$s = "select * from wt_barber " ;
//$q = "select queuenumber from wt_queue where barbername = '$barbername'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
//($t2 = mysqli_query($db, $q)) or die(mysqli_error($db));


echo "<select  name=\"barber\">";
//OPTIONS
while (($r = mysqli_fetch_array($t,MYSQLI_ASSOC)) || ($o = mysqli_fetch_array($t2,MYSQLI_ASSOC)) ) {
    $barber = $r["barbername"];
    echo "<option value = \"$barber\">";
    echo  "$barber <br>";

    echo "</option>";

}

//End Option Wrapper
echo "</select>";

?>