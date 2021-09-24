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
$filename = $_FILES['files']['name'];
$dir = "/contact-files";
if(is_file($_FILES['file']))
{
	// $message = $_GET['message'];
	// $formcontent ="From: $name \n Message: $message";
	$formcontent ="Name: $name \n Email: $email \n Phone: $phone \n Service: $service \n Sub-service: $subService \n Designation: $designation \n  Additional Info: $additionalInfo \n Location: $location \n Industry: $industry";
	$recipient = "chukkydave@gmail.com";
	// $recipient = "enquiry@cedarsandcoleman.com";
	$subject = "Cedars and Coleman service request form";

	$filename = $_FILES['files']['name'];
	$file = $dir. $filename;
	$content = file_get_contents($file);
	$content = chunk_split(base64_encode($content));

	$separator = md5(time());
	$eol = "\r\n";
	// main header (multipart mandatory)
	$headers = "From: name {$email}" . $eol;
	$headers .= "MIME-Version: 1.0" . $eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
	$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
	$headers .= "This is a MIME encoded message." . $eol;

	//body
	$body = "--" . $separator . $eol;
	$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
	$body .= "Content-Transfer-Encoding: 8bit" . $eol;
	$body .= $formcontent . $eol;

	// attachment
	$body .= "--" . $separator . $eol;
	$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
	$body .= "Content-Transfer-Encoding: base64" . $eol;
	$body .= "Content-Disposition: attachment" . $eol;
	$body .= $content . $eol;
	$body .= "--" . $separator . "--";

	if(mail($recipient, $subject, $body, $headers))
	{
		echo json_encode('successful');
	}
	else
	{
		echo json_encode('error');
	}
}
else
{
	echo json_encode('You need to upload a file');
}

?>