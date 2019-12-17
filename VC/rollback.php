#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$type = $_GET['type'];

if($type=="rollback"){
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$sendto = $_GET['to'];
$desip = $_GET['desip'];
$des = $_GET['des'];
$req = array("type"=>$type,"des"=>$des,"desip"=>$desip,"sendto"=>$sendto);
$response = $client->send_request($req);
$nv = substr($response, -5.1) ;
if ($nv == 0){
echo "no gooooooooooooooood";
exit();
}else{
#zip and send the version to the VC VM
exec("./send.sh $desip $sendto $nv");}
echo "Goooooooooooooood";
#zip and send the version to the VC VM
#exec("./send.sh $desip $to $nv");
}


?> 
