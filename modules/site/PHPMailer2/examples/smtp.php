<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';



//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

	$mail_sel=1;//qq邮箱没试成功
	
	//Set the hostname of the mail server
	if($mail_sel==1)
	{
		$mail->Host = "smtp.sina.com";
	}
	else if($mail_sel==2)
	{
		$mail->Host = "smtp.163.com";
	}
	else
	{
		$mail->Host = "smtp.qq.com";
	}

//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;



if($mail_sel==1)
{
	//Username to use for SMTP authentication
	$mail->Username = "q838149211@sina.com";
	//Password to use for SMTP authentication
	$mail->Password = "110110520";
	//Set who the message is to be sent from
	$mail->setFrom('q838149211@sina.com', 'First Last');
	//Set an alternative reply-to address
	$mail->addReplyTo('q838149211@sina.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress('q838149211@sina.com', 'John Doe');
}
else if($mail_sel==2)
{

	//Username to use for SMTP authentication
	$mail->Username = "m13538257788@163.com";
	//Password to use for SMTP authentication
	$mail->Password = "tel135382577889";
	//Set who the message is to be sent from
	$mail->setFrom('m13538257788@163.com', 'First Last');
	//Set an alternative reply-to address
	$mail->addReplyTo('q838149211@sina.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress('q838149211@sina.com', 'John Doe');
	
}
else
{
	//Username to use for SMTP authentication
	$mail->Username = "838149211@qq.com";
	//Password to use for SMTP authentication
	$mail->Password = "Password";
	//Set who the message is to be sent from
	$mail->setFrom('838149211@qq.com', 'First Last');
	//Set an alternative reply-to address
	$mail->addReplyTo('q838149211@sina.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress('q838149211@sina.com', 'John Doe');
}


//Set the subject line
$mail->Subject = '----------title_(6)----------';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
