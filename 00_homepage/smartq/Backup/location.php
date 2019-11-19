<?php
include("connectDB.php");

//MENU.PHP
$s = "select distinct city from wt_store " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"location\">";
//OPTIONS
while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $location = $r["city"];
    $store = $r["storename"];

    echo "<option value = \"$location\">";
    echo  "$location ";
    echo "</option>";
    echo "<br>";
}

//End Option Wrapper
echo "</select>";
//End Menu Wrapper
?>