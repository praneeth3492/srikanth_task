<?php

 
 
 
error_reporting (E_ALL ^ E_NOTICE);

 


$name = $_GET['name'];
    $company = $_GET['company'];
    $phone = $_GET['phone'];
    $country = $_GET['country'];
 $role = $_GET['role'];
 $message = $name.' Phone:'.$phone.' Company:'.$company.' Role:'.$role.' Country:'.$country. $_GET["message"];






$username="Srikanth@990";

$password=" Srikanth@990";

 

$mobile_number="9502099553,".$phone;

$url ="https://login.bulksmsgateway.in/textmobilesmsapi.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&message=".urlencode($message)."&type=".urlencode('3');

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$curl_scraped_page = curl_exec($ch);

curl_close($ch);


 
 
 echo '<script>alert("Message Sent successfull")</script>';
			echo "<script type='text/javascript'> document.location ='/contact.html'; </script>";



?>