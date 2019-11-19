<?php
include("connectDB.php");
$category = $_POST['category'];
//$merchantid = $_POST['merchant'];
echo $category;
//echo  $merchantid;

$s= "select * from business WHERE category = '$category'";
($t = mysqli_query($db, $s)) or die(mysqli_error($db));
while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)) {
    $location = $r["location"];
    $stoername = $r["storename"];
    $queueid = $r["queueid"];


    echo " <br>Location: $location<br>";
    echo " <br>Store Name: $stoername<br>";
    echo " <br>Queue ID: $queueid<br><br><br>";

}
echo"<br>done";
//header("Location: category_form.php");
?>