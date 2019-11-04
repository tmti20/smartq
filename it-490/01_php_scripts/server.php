<?php
require_once('account.php');
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$connection=new mysqli($hostname, $username, $mypassword, $database);

function mysort($email){
  $connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
  $query = "select * from queue";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  while($row = $result->fetch_array())
  {$rows[] = $row;}
  return $rows;
  //print_r($rows);
}

function udoLogin($email,$password)
{
$connection=new mysqli("172.23.249.138", "myuser", "mypass", "test");
$query = "select * from users where email='$email' and userpass='$password' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  $errorMsg="user with email id: ".$email." has logged in";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 1 ;
}else{
  $errorMsg="user with email id: ".$email." login failed";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}

//--------------client Login
function cdoLogin($email,$password)
{
$connection=new mysqli("172.23.249.138", "myuser", "mypass", "test");
$query = "select * from business where email='$email' and password='$password' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  $errorMsg="client with email id: ".$email." has logged in";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  return 1 ;

}else{
  $errorMsg="client with email id: ".$email." login failed";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}
//register Marchant
function cdoRegister($location,$storename,$email,$category,$lat,$longit,$password)
{ 
<<<<<<< HEAD:01_php_scripts/server.php
=======
$connection=new mysqli("172.23.249.138", "myuser", "mypass", "test");
>>>>>>> aee2e1cb42abc7afb5413f935112f565694e0ee9:it-490/01_php_scripts/server.php
//$query = "INSERT INTO `business` VALUES ('locaiton','$storename','email','category','lat','longit','password',now())";
// create table business( marchantid int NOT NULL AUTO_INCREMENT, location varchar(255), storename varchar(255), email varchar(255), category varchar(255), lat varchar(255), longit varchar(255), password varchar(255), timestamp varchar(255),PRIMARY KEY(marchantid));
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
$query = "INSERT INTO business(location,storename,email,category,lat,longit,password,timestamp) VALUES ('$location','$storename','$email','$category','$lat','$longit','$password',now())";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}
//registers users
function udoRegister($location,$email,$lat,$longit,$password)
{ 
<<<<<<< HEAD:01_php_scripts/server.php
=======
$connection=new mysqli("172.23.249.138", "myuser", "mypass", "test");
>>>>>>> aee2e1cb42abc7afb5413f935112f565694e0ee9:it-490/01_php_scripts/server.php
//$query = "INSERT INTO `business` VALUES ('locaiton','$storename','email','category','lat','longit','password',now())";
//udoRegister($request['location'],$request['email'],$request['lat'],$request['longit'],$request['password']);
//create table users( userid int NOT NULL AUTO_INCREMENT,email varchar(255), userpass varchar(255), location varchar(255),lat varchar(255),longit varchar(255),PRIMARY KEY(userid));
$connection=new mysqli("192.168.1.123", "myuser", $password, $database); 
$query = "INSERT INTO users(location,email,lat,longit,userpass) VALUES ('$location','$email','$lat','$longit','$password')";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}
// Add queue by client
function AddQueclient($queueid,$queueduration){
<<<<<<< HEAD:01_php_scripts/server.php
  $connection=new mysqli("192.168.1.123", "myuser", $password, $database); 
=======
  $connection=new mysqli("172.23.249.138", "myuser", "mypass", "test"); 
>>>>>>> aee2e1cb42abc7afb5413f935112f565694e0ee9:it-490/01_php_scripts/server.php
  $query = "INSERT INTO queue(queueid, queueduration, queuetime) VALUES ($queueid,$queueduration,now())";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0 ;
  }
  }
// Remove queue by client
function removeQueclient($queueid){
<<<<<<< HEAD:01_php_scripts/server.php
  $connection=new mysqli("192.168.1.123", "myuser", $password, $database); 
=======
  $connection=new mysqli("172.23.249.138", "myuser", "mypass", "test"); 
>>>>>>> aee2e1cb42abc7afb5413f935112f565694e0ee9:it-490/01_php_scripts/server.php
  $query = "DELETE FROM queue WHERE queueid = $queueid";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0;
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
    case "Qremove_client":
    return removeQueclient($request['queueid']);
    case "Qadd_client":
    return AddQueclient($request['queueid'],$request['queueduration']);
    case "Login":
      return udoLogin($request['email'],$request['password']);
    case "cLogin":
    return cdoLogin($request['email'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "cregistration":
      return cdoRegister($request['location'],$request['storename'],$request['email'],$request['category'],$request['lat'],$request['longit'],$request['password']);
      case "uregistration":
      return udoRegister($request['location'],$request['email'],$request['lat'],$request['longit'],$request['password']);
      case "sort":
      return mysort($request['email']);
    }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>


