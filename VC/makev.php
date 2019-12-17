#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$type = $_GET['type'];

if($type=="pushv"){
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$sender = $_GET['sender'];
if($sender == "fe"){
$hostip = "192.168.1.141";
}elseif($sender == "be"){
$hostip = "192.168.1.131";
}else{
echo "Wrong entry !";
exit();
}
$req = array("type"=>$type,"sender"=>$sender,"hostip"=>"$hostip");
$response = $client->send_request($req);
$nv = substr($response, -5.1) ;

# send the version to the VC VM
exec("./makev.sh $sender $nv $hostip");
//sendv($nv,$sender);
//echo " yeeeeee $response \n";
//sendv($nv,$sender);
}

function sendv($nv,$sender){
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$req = array("type"=>"sendv","sender"=>$sender,"versionnumber"=>"$nv","hostip"=>"192.168.1.131");
$response = $client->send_request($req);
}
#insert into database the version info
#$query = "insert into version (hostip,time,versionnumber,sender) values ('192.168.1.131',NOW(),'$nv','$sender')";
#$result = mysqli_query($connection, $query) or die(mysqli_error($connection));


//echo " $nv \n";
//exit();
?> 
