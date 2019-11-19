<?php
session_start();
include("DB/connectDB.php");

//$s = "select storename from wt_store where city = '$location' " ;
$s = "select distinct city from wt_store " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"location\">";
//OPTIONS
while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $location = $r["city"];

    echo "<option value = \"$location\">";
    echo  "$location ";
    echo "</option>";
    echo "<br>";
}

//End Option Wrapper
echo "</select>";
?>
