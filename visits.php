<?php $ref = $_GET['r'];

if($_GET['r']){
    

$ref=base64_decode(base64_decode($ref));
   session_start();
     $_SESSION['NSA_REFERER']=$ref;
    
//     require_once("setrefcookie.php");
$ip = $_SERVER['REMOTE_ADDR'];

    $date = date("d-M-Y");
    $time = date("H:i");
    $timest = strtotime($date);
       $bcinfo = json_decode(file_get_contents("http://ip-api.com/json/".$ip."?format=json"), true);

 
  $city = $bcinfo["city"];
     $region = $bcinfo["regionName"];
     $country = $bcinfo["country"];
    
  //  $nos = mysqli_num_rows(mysqli_query($conn,"select * from visits where referer='$ref' and ip='$ip' and date='$date'"));
     
    //session_start();
  
    
mysqli_query($conn,"INSERT into visits(`referer`,`ip`,`date`,`time`,`timest`,`city`,`region`,`country`) values ('$ref','$ip','$date','$time','$timest','$city','$region','$country')");
   
}