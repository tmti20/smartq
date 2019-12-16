<?php
if ($rating == ""){
    $star = "No Rating";
}elseif ($rating == 1){
    $star = "= *";
}elseif ($rating == 2){
    $star = "= **";
}elseif ($rating == 3){
    $star = "= ***";
}elseif ($rating == 4){
    $star = "= ****";
}elseif ($rating == 5){
    $star = "= *****";
}
?>