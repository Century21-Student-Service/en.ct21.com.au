<?php

//-----------------------------------邮件发送-----------------------------------


function iSendMailEx($mysubject,$mycontent)
{
	$isend=iSendMail("q838149211@sina.com","110110520","q838149211@sina.com","yong","reguser",$mysubject,$mycontent);
	
	//$isend=iSendMail("m13538257788@163.com","tel135382577889","q838149211@sina.com","yong","reguser",$mysubject,$mycontent);

	//$isend=iSendMail("838149211@qq.com","password","q838149211@sina.com","yong","reguser",$mysubject,$mycontent);
	
	return $isend;
}

function iSendMail($sendFrom,$myPass,$sendTo,$fromName,$toName,$mysubject,$mycontent)
{
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
		$mail->Username = $sendFrom;
		//Password to use for SMTP authentication
		$mail->Password = $myPass;
		//Set who the message is to be sent from
		$mail->setFrom($sendFrom, $fromName);
		//Set an alternative reply-to address
		$mail->addReplyTo($sendFrom, $fromName);
		//Set who the message is to be sent to
		$mail->addAddress($sendTo, $toName);
	}
	else if($mail_sel==2)
	{

		//Username to use for SMTP authentication
		$mail->Username = $sendFrom;
		//Password to use for SMTP authentication
		$mail->Password = $myPass;
		//Set who the message is to be sent from
		$mail->setFrom($sendFrom, $fromName);
		//Set an alternative reply-to address
		$mail->addReplyTo($sendFrom, $fromName);
		//Set who the message is to be sent to
		$mail->addAddress($sendTo, $toName);
		
	}
	else
	{		
		//Username to use for SMTP authentication
		$mail->Username = $sendFrom;
		//Password to use for SMTP authentication
		$mail->Password = $myPass;
		//Set who the message is to be sent from
		$mail->setFrom($sendFrom, $fromName);
		//Set an alternative reply-to address
		$mail->addReplyTo($sendFrom, $fromName);
		//Set who the message is to be sent to
		$mail->addAddress($sendTo, $toName);
		
	}


	//Set the subject line
	$mail->Subject = $mysubject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = $mycontent;
	//Attach an image file
	$mail->addAttachment('images/logo.png');

	//send the message, check for errors
	if (!$mail->send()) {
		
		//echo "Mailer Error: " . $mail->ErrorInfo;
		return false;
	} else {
		//echo "Message sent!";
		return true;
	}



}

//------------------------------------------------------------------------------


?>