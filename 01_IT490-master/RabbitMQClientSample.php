<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
$type="login";
$username="mamun";
$pass="";
$req = array("username"=>$username, "type"=>$type,"pass"=>$password);
//echo  "Client sending request......\n";
$response = $client->send_request($req);
//convert std class to array
$arr=get_object_vars($response);
echo $arr["message"]."\n";
?>