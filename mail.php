<?php 
$name = $_GET['name'];
$phone = $_GET['phone'];
$service = $_GET['service'];
$subService = $_GET['sub-service'];
$designation = $_GET['designation'];
$additionalInfo = $_GET['additional-Info'];
$email = $_GET['business-email'];
$location = $_GET['business-location'];
$industry = $_GET['business-industry'];
// $message = $_GET['message'];
// $formcontent ="From: $name \n Message: $message";
$formcontent ="Name: $name \n Email: $email \n Phone: $phone \n Service: $service \n Sub-service: $subService \n Designation: $designation \n  Additional Info: $additionalInfo \n Location: $location \n Industry: $industry";
// $recipient = "chukkydave@gmail.com";
$recipient = "enquiry@cedarsandcoleman.com";
$subject = "Cedars and Coleman service request form";
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