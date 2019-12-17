<?php
session_start();
//$_SESSION["authenticated"] = False;
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//$connection=new mysqli($hostname, $username, $mypassword, $database);

function mysort($email,$password){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
  $connection=new mysqli("$masterip", "myuser", "mypass", "test");
  $query = "select * from users where email='$email'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  while($row = $result->fetch_array())
  {$rows[] = $row;}
  return $rows;
  //print_r($rows);
}


//------------------ User Login -----------------------------------
function udoLogin($uemail,$upassword){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
#$connection=new mysqli("192.168.1.121", "myuser", "mypass", "test");
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
// if the first connection fails in master db then it will go to the if statement and check connection for slave db.
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }

$query = "select * from users where email='$uemail' and userpass='$upassword' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  //$_SESSION["authenticated"] = False;
  $errorMsg="user with email id: ".$uemail." has logged in";
  $query = "INSERT INTO `error`(errormessage, errortime) VALUES ('$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 1 ;
}else{
  $errorMsg="user with email id: ".$uemail." login failed";
  $query = "INSERT INTO `error`(errormessage, errortime) VALUES ('$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}


//--------------Client Login-------------------------------------
function cdoLogin($email,$password)
{
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query = "select * from business where email='$email' and merchantpass ='$password' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count >= 1){
  $_SESSION["authenticated"] = True;
  $errorMsg="client with email id: ".$email." has logged in";
  $query = "INSERT INTO `error`( errormessage, errortime) VALUES ('$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  return 1;

}else{
  $errorMsg="client with email id: ".$email." login failed";
  $query = "INSERT INTO `error`( errormessage, errortime) VALUES ('$errorMsg', NOW());";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
return 0 ;
}
}


//--------------------Register Marchant------------------------
function cdoRegister($caddress,$cstore,$email,$category,$password)
{ 
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query = "INSERT INTO business(location,storename,email,category,merchantpass,timestamp) VALUES ('$caddress','$cstore','$email','$category','$password',now())";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}


//-------------------------------Registers users----------------------------
function udoRegister($location,$email,$password)
{ 
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query = "INSERT INTO users(location, email,userpass ) VALUES ('$location','$email','$password' )";
//$query = "INSERT INTO users(email,userpass, location, lat, longit) VALUES ('akm@gmail.com','123','newark','123','345')";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}


// Add queue by client
function AddQueclient($queueid,$queueduration){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
  $connection=new mysqli("$masterip", "myuser", $password, $database); 
  $query = "INSERT INTO queue(queueid, queueduration, queuetime) VALUES ($queueid,$queueduration,now())";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0 ;
  }
  }


// Remove queue by client
function removeQueclient($queueid){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
  $connection=new mysqli("$masterip", "myuser", $password, $database); 
  $query = "DELETE FROM queue WHERE queueid = $queueid";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  if ($result){ return 1 ; }
  else { 
  return 0;
  }
  }
function category(){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=new mysqli("$masterip", "myuser", "mypass", "test"); 
$query = "select category from business";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ;}
else { 
  return 0 ;
}
}

function location($username){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query ="select distinct location from business ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$datas =array();
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $datas[] = $r['location'];
    }
return $datas;

}


function store($location){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query =  "select distinct storename from business where location = '$location'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$datas =array();
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $datas[] = $r['storename'];
    }
return $datas;

}


//------------------ services -----------------------------------
function service(){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query = "select * from service ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$datas =array();
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $datas[] = $r['servicename'];
    }
return $datas;
}


function stime($service,$store,$location){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
//------------------ services Time -----------------------------------
$query = "select * from service where servicename = '$service'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
$servicetime = $r['servicetime'];
//------------------ services position -----------------------------------
$query = "select  *  from queue where storename = '$store' and location = '$location'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$num = mysqli_num_rows($result);
$position = $num +1;
//------------------ services duration -----------------------------------
$query = "select  max(queueduration)  from queue where storename = '$store' and location = '$location'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
$queueduration = $r['max(queueduration)'];

$datas = array();
$datas[]= $servicetime;
$datas[]= $position;
$datas[]= $queueduration;
return $datas;

}


//------------------ Confirm Order -----------------------------------
function corder($username,$storename,$queueduration, $location,$queueposition){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
//------------------ Insert Order Deatails  -----------------------------------
$query = "insert into queue (username,storename,queueduration,queuetime, location,queueposition) values ('$username','$storename','$queueduration', NOW(),'$location','$queueposition' )";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
//------------------ Get Order id and position -----------------------------------
$query = "select * from queue where storename = '$storename' and location = '$location' order by queuetime DESC limit 1";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
$username = $r['username'];
$queueid = $r['queueid'];
$queueposition = $r['queueposition'];
$waittime = $r['queueduration'];

$datas =array();
$datas[]= $username;
$datas[]= $queueid;
$datas[]= $queueposition;
$datas[]= $waittime;
return $datas;
}


//------------------ Home page info -----------------------------------
function home($username){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }
$query = "select * from queue where username = '$username'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$num = mysqli_num_rows($result); 

$datas =array();
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $datas[] = $r['queueid'];
        $datas[] = $r['storename'];
        $datas[] = $r['location'];
	$datas[] = $r['queueposition'];
        $datas[] = $r['queueduration'];
    }
return $datas;
}


//------------------ Store queue info -----------------------------------
function squeue($email){
$masterip = "192.168.1.121";
$slaveip = "192.168.1.120";
$connection=mysqli_connect("$masterip", "myuser", "mypass", "test");
//------------------ Database Failover -----------------------------------
if (mysqli_connect_errno()){
	#echo "Master Database failed to connect to MySQL: " . mysqli_connect_error();
	echo "Master Database failed to connect to MySQL \n" ;
	echo "Connecting  to Slave \n\n";
	$connection=mysqli_connect("$slaveip", "myuser", "mypass", "test");
	 }

$query = "select * from business where email = '$email'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection)); 
$r = mysqli_fetch_array($result, MYSQLI_ASSOC);
$storename = $r['storename'];


$query = "select * from queue where storename = '$storename'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$num = mysqli_num_rows($result); 
$datas =array();
while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $datas[] = $r['queueid'];
        $datas[] = $r['username'];
        $datas[] = $r['location'];
	$datas[] = $r['queueposition'];
        $datas[] = $r['queueduration'];
    }
return $datas;
}


//=================== RMQ Processor ============================================

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
      case "location":
      return location($request['username']);
      case "store":
      return store($request['location']);
      case "service":
      return service();
      case "stime":
      return stime($request['service'], $request['store'],$request['location']);
      case "corder":
      return corder($request['username'], $request['storename'],$request['queueduration'] ,$request['location'],$request['queueposition']);
      case "home":
      return home($request['username']);
      case "squeue":
      return squeue($request['email']);
    }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>


