<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
//$type="login";
//$username="azi3";
//$pass="1234";
$type=$_GET["type"];
if($type=="registration"){
    $location=$_GET['address'];
    $storename=$_GET['storename'];
    $email=$_GET['email'];
    $category=$_GET['category'];
    $lat=$_GET['lat'];
    $longit=$_GET['longit'];
    $pass=$_GET['password'];
    $type=$_GET['type'];
    $req = array("type"=>$type,"location"=>$location,"storename"=>$storename,"email"=>$email,"category"=>$category,"lat"=>$lat,"longit"=>$longit,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo "Your registration is succesfull \n\n";
    }
    else{
    echo "registration is Failed \n\n";
    }    
}
else if($type=="login"){
    $username=$_POST["username"];
    $pass=$_POST["password"];
    $req = array("username"=>$username, "type"=>$type,"password"=>$pass);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo "Your login is succesfull \n\n";
    }
    else{
    echo "Login Failed \n\n";
    }
}

?>
