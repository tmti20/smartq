<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($user,$pass){
	$res=array();
	if($user=="mamun"){
		$res["message"]="succes";
		$res["message2"]="succes";
	}
	else{
		$res["message"]="Failed";
	}
	return $res;	
}
function request_processor($req){
	if(!isset($req['type'])){
		return __FILE__ . ".Error: unsupported message type";
	}
	$type = $req['type'];
	switch($type){
		case "login":
			return login($req['username'], $req['password']);
		case "validate_session":
			return validate($req['session_id']);
		case "echo":
			return doEcho($req);
	}
	// This is what is returned
	return array("message" => "Default");
}

$server = new rabbitMQServer("testRabbitMQ.ini", "sampleServer");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>
