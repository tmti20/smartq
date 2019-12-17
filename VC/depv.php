#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$type = $_GET['type'];

if($type=="depv"){
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$to = $_GET['to'];
$des = $_GET['des'];
$desip = $_GET['desip'];
$req = array("type"=>$type, "des"=>$des,"desip"=>$desip,"to"=>$to,"hostip"=>"192.168.1.101");
$response = $client->send_request($req);
$nv = substr($response, -5.1) ;
if ($nv == 0){
echo "no gooooooooooooooood";
exit();
}else{
#zip and send the version to the VC VM
exec("./send.sh $desip $to $nv");}
}


?> 
