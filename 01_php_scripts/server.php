<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//include 'database.php';
//$connection=new mysqli("localhost", "aj", "aj123", "rabbitMQ");
function doLogin($username,$password)
{
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");

$query = "select * from users where username='$username' and userpass='$password' ";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count >= 1){
return 1 ;

}else{
return 0 ;
}
}

//registers users
function doRegister($location,$storename,$email,$category,$lat,$longit,$password)
{ 
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
//$query = "INSERT INTO `business` VALUES ('locaiton','$storename','email','category','lat','longit','password',now())";
$query = "INSERT INTO `business` VALUES ('$location','$storename','$email','$category','$lat','$longit','$password',now())";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}


function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "registration":
      return doRegister($request['location'],$request['storename'],$request['email'],$request['category'],$request['lat'],$request['longit'],$request['password']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

