#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$type = $_GET['type'];

if($type=="vstatus"){
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$vstatus = $_GET['vstatus'];
$des = $_GET['des'];
$sendto = $_GET['sendto'];
$req = array("type"=>$type, "des"=>$des,"vstatus"=>$vstatus,"sendto"=>$sendto);
$response = $client->send_request($req);

#zip and send the version to the VC VM
#exec("./send.sh $desip $to $nv");
}


?> 
