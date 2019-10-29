<?php
$connection=new mysqli("127.0.0.1", "root", "Ma@142566", "mydb");
$user="azi3";
$query = "select * from users where ucid='$user' ";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count >= 1){
echo "Succes";

}else{
    echo "Not Succes";
}

?>