<?php
include("connectDB.php");
//MENU.PHP

$location = "Paterson";
$s = "select storename from wt_store where city = '$location' " ;
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
//End Menu Wrapper
?>