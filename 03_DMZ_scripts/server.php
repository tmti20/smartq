<?php
require_once('account.php');
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$connection=new mysqli($hostname, $username, $mypassword, $database);
function write_to_text($filename,$txt){
  $myfile = fopen($filename, "a") or die("Unable to open file!");
  fwrite($myfile, $txt);
  fclose($myfile); 
  }  
function testRegister($type,$name)
{ 
//$query = "INSERT INTO `business` VALUES ('locaiton','$storename','email','category','lat','longit','password',now())";
// create table business( marchantid int NOT NULL AUTO_INCREMENT, location varchar(255), storename varchar(255), email varchar(255), category varchar(255), lat varchar(255), longit varchar(255), password varchar(255), timestamp varchar(255),PRIMARY KEY(marchantid));
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test");
$query = "INSERT INTO test(name) values('$name')";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
if ($result){ return 1 ; }
else { 
  return 0 ;
}
}
function cdoRegister($location,$storename,$email,$category,$lat,$longit,$password)
{ 
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
function udoRegister($location,$email,$password)
{
$lat=0;
$longit=0;
  $address= '35 manor drive,newark,new jersey,07106';
  $apiKey = 'AIzaSyAtu4HVGNms2cRNWidF0-aYE1g34j1aPGQ'; // Google maps now requires an API key.
  // Get JSON results from this request
  $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location).'&sensor=false&key='.$apiKey);
  //echo $geo;
  $geo = json_decode($geo, true); // Convert the JSON to an array
  if (isset($geo['status']) && ($geo['status'] == 'OK')) {
    $lat = $geo['results'][0]['geometry']['location']['lat']; // Latitude
    $longit = $geo['results'][0]['geometry']['location']['lng']; // Longitude
    write_to_text("newfile.txt","Request processed : "."latitude is: ".$lat." Longgitute is: ".$longit." Time is: ".date("Y-m-d H:i:s",time())."\n");
  }
$connection=new mysqli("192.168.1.123", "myuser", "mypass", "test"); 
$query = "INSERT INTO users(location,email,lat,longit,userpass) VALUES ('$location','$email','$lat','$longit','$password')";
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
    case "reg":
      return testRegister($request['type'],$request['name']);
    case "cregistration":
      return cdoRegister($request['location'],$request['storename'],$request['email'],$request['category'],$request['lat'],$request['longit'],$request['password']);
      case "Registration":
      return udoRegister($request['location'],$request['email'],$request['password']);
    }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>


