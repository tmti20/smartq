<?php
//$address = 'BTM 2nd Stage, Bengaluru, Karnataka 560076'; // Address
function write_to_text($filename,$txt){
  $myfile = fopen($filename, "a") or die("Unable to open file!");
  fwrite($myfile, $txt);
  fclose($myfile); 
  }
function getGeo($address){
  $apiKey = 'AIzaSyAtu4HVGNms2cRNWidF0-aYE1g34j1aPGQ'; // Google maps now requires an API key.
  // Get JSON results from this request
  $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
  //echo $geo;
  $geo = json_decode($geo, true); // Convert the JSON to an array
  if (isset($geo['status']) && ($geo['status'] == 'OK')) {
    $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
    $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
    write_to_text("newfile.txt","Request processed : "."latitude is: ".$latitude." Longgitute is: ".$longitude." Time is: ".date("Y-m-d H:i:s",time())."\n");
  }
}
$address= '35 manor drive,newark,new jersey,07106';
getGeo($address);
?>







        