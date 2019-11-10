<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//$connection=new mysqli($hostname, $username, $mypassword, $database);

function mysort($email,$password){
  $connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
  $query = "select * from users where email='$email'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  while($row = $result->fetch_array())
  {$rows[] = $row;}
  return $rows;
  //print_r($rows);
}

function udoLogin($uemail,$upassword)
{
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
$query = "select * from users where email='$uemail' and userpass='$upassword' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  $errorMsg="user with email id: ".$uemail." has logged in";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 1 ;
}else{
  $errorMsg="user with email id: ".$uemail." login failed";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}

//--------------client Login
function cdoLogin($email,$password)
{
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
$query = "select * from business where email='$email' and password='$password' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  $errorMsg="client with email id: ".$email." has logged in";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  return 1;

}else{
  $errorMsg="client with email id: ".$email." login failed";
  $query = "INSERT INTO `error`(errornumber, errormessage, errortime) VALUES ('101','$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}
//register Marchant
function cdoRegister($caddress,$cstore,$email,$category,$password)
{ 
// return cdoRegister($request['caddress'],$request['cstore'],$request['cemail'],$request['ccategory'],$request['cpassword']);
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
$query = "INSERT INTO business(location,storename,email,category,password,timestamp) VALUES ('$caddress','$cstore','$email','$category','$password',now())";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}
//registers users
function udoRegister($location,$email,$password)
{ 
//      return udoRegister($request['uaddress'],$request['uemail'],$request['upassword']);
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test"); 
$query = "INSERT INTO users(location,email,userpass) VALUES ('$location','$email','$password')";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}
// Add queue by client
function AddQueclient($queueid,$queueduration){
  $connection=new mysqli("192.168.1.123", "myuser", $password, $database); 
  $query = "INSERT INTO queue(queueid, queueduration, queuetime) VALUES ($queueid,$queueduration,now())";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0 ;
  }
  }
// Remove queue by client
function removeQueclient($queueid){
  $connection=new mysqli("192.168.1.123", "myuser", $password, $database); 
  $query = "DELETE FROM queue WHERE queueid = $queueid";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0;
  }
  }
function category(){
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test"); 
$query = "select category from business";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ;}
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
    case "Qremove_client":
    return removeQueclient($request['queueid']);
    case "Qadd_client":
    return AddQueclient($request['queueid'],$request['queueduration']);
    case "Ulogin":
      return udoLogin($request['uemail'],$request['upassword']);
    case "cLogin":
    return cdoLogin($request['cemail'],$request['cpassword']);
    case "validate_session":
      return doValidate($request['sessionId']);
    case "cregistration":
      return cdoRegister($request['caddress'],$request['cstore'],$request['cemail'],$request['ccategory'],$request['cpassword']);
      case "uregistration":
      return udoRegister($request['uaddress'],$request['uemail'],$request['upassword']);
      case "sort":
      return mysort($request['email'],$request["password"]);
      case "category":
      return category();

    }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>


