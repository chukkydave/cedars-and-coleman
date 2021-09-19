<?php 
$name = $_GET['name'];
$email = $_GET['email'];
// $message = $_GET['message'];
// $formcontent ="From: $name \n Message: $message";
$formcontent ="Name: $name \n Email: $email";
$recipient = "chukkydave@gmail.com";
$subject = "divineemole.com contact form";
$mailheader = "From: $email \r\n";

if(mail($recipient, $subject, $formcontent, $mailheader))
{
	echo json_encode('successful');
}
else
{
	echo json_encode('error');
}


?>