<?php

session_start();
//$_SESSION["location"];
include("DB/connectDB.php");
//MENU.PHP
//$location= $_POST["location"];
//$_SESSION ["location"] = $location;
//$s = "select storename from wt_store where city = '$location' " ;
$s = "select distinct storename from wt_store " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"store\">";
//OPTIONS
while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $store = $r["storename"];

    echo "<option value = \"$store\">";
    echo  "$store ";
    echo "</option>";
    echo "<br>";
}

//End Option Wrapper
echo "</select>";
?>
