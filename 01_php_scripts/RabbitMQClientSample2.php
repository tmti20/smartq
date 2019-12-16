<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
//$type="login";
//$username="azi3";
//$pass="1234";
$type=$_GET["type"];
$type2="sort";
$type3="reg1";
//----------------------------------------------------
if($type=="sort"){
  $uemail=$_GET["uemail"];
  //$email="azi3@njit.edu";
  $req = array("type"=>"sort","email"=>$uemail);
  $response = $client->send_request($req);
  //convert std class to array
  $array = json_decode(json_encode($response), True);
  echo json_encode($array);
  //echo json_encode($array);
  //print_r($array);  
}
else if($type=="category"){
  $req = array("type"=>"category");
  $response = $client->send_request($req);
  $response = $client->send_request($req);
  if($response==1){
    echo json_encode("hi");
   }
   else{
    echo json_encode("Failed");
   }
  //echo $response;
}
else if($type=="cregistration"){
    $caddress=$_GET['caddress'];
    $cstorename=$_GET['cstore'];
    $cemail=$_GET['cemail'];
    $ccategory=$_GET['ccategory'];
    $cpassword=$_GET['cpassword'];
    $cpassword = sha1($cpassword);
    $type=$_GET['type'];
    $req = array("type"=>$type,"caddress"=>$caddress,"cstore"=>$cstorename,"cemail"=>$cemail,"ccategory"=>$ccategory,"cpassword"=>$cpassword);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo 1;
    }
    else{
    echo "registration is Failed \n\n";
    }    
}
else if($type=="uregistration"){
    $uaddress=$_GET['uaddress'];
    $uemail=$_GET['uemail'];
    $upassword=$_GET['upassword'];
    $upassword = sha1($upassword);
    $type=$_GET['type'];
    $req = array("type"=>$type,"uaddress"=>$uaddress,"uemail"=>$uemail,"upassword"=>$upassword);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo 1;
    }
    else{
    echo "registration is Failed \n\n";
    }    
}
else if($type=="Ulogin"){
    $uemail=$_GET["uemail"];
    $upassword=$_GET["upassword"];
    $upassword = sha1($upassword);
    $type=$_GET["type"];
    $req = array("type"=>$type,"uemail"=>$uemail,"upassword"=>$upassword);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
      echo 1;
    }
    else{
    echo "Login Failed \n\n";
    }
}
else if($type=="cLogin"){
    $cemail=$_GET["cemail"];
    $cpassword=$_GET["cpassword"];
    $cpassword = sha1($cpassword);
    $type=$_GET["type"];
    $req = array("type"=>$type,"cemail"=>$cemail, "type"=>$type,"cpassword"=>$cpassword);
    $response = $client->send_request($req);
    //convert std class to array
    //print_r($response);
    if($response==1){
     echo 1; 
    }
    else{
    echo "Login Failed \n\n";
    }
}
else if($type=="Qadd_client"){
  $queueid=$_GET["queueid"];
  $queueduration=$_GET["queueduration"];
  $type=$_GET["type"];
  $req = array("type"=>$type,"queueid"=>$queueid, "type"=>$type,"queueduration"=>$queueduration);
  $response = $client->send_request($req);
  //convert std class to array
  //print_r($response);
  if($response==1){
   echo '
   <p>Added to the queue</p>
      ';
      //echo "Your login is succesfull \n\n";
   //header("Location: http://localhost/it-490/01_php_scripts/02_client_loggedIn/clientLoggedIn.php");
  }
  else{
  echo "Failed \n\n";
  }
}
else if($type=="Qremove_client"){
  $queueid=$_GET["queueid"];
  $type=$_GET["type"];
  $req = array("type"=>$type,"queueid"=>$queueid, "type"=>$type);
  $response = $client->send_request($req);
  //convert std class to array
  //print_r($response);
  if($response==1){
   echo '
   <p>Removed from the queue</p>
      ';
      //echo "Your login is succesfull \n\n";
   //header("Location: http://localhost/it-490/01_php_scripts/02_client_loggedIn/clientLoggedIn.php");
  }
  else{
  echo "Failed \n\n";
  }
}
?>
