<?php
include("DB/connectDB.php");

$s = "select * from wt_service " ;
($t = mysqli_query($db, $s)) or die(mysqli_error($db));

//MENU
echo "<select  name=\"service\" >";
//OPTIONS
while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC)){
    $service = $r["style"];
    $price = $r ["price"];

    echo "<option value = \"$service\">";
    echo  "$service : ";
    echo  " $$price ";
    echo "</option>";
    echo "<br>";
}

////End Option Wrapper
echo "</select>";

?>