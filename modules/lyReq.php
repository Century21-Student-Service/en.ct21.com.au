<?php
header("content-type:application/json;charset=utf-8");


error_reporting(E_ALL & ~E_NOTICE);

session_start();

//---------------邮件发送-------beg--------
date_default_timezone_set('Etc/UTC');


require '../PHPMailer2/PHPMailerAutoload.php';
require '../PHPMailer2/fun.php';
require '../PHPMailer2/fun_mail.php';

// require '../../mail/includes/libraries/PHPMailer2/PHPMailerAutoload.php';
// require '../../mail/includes/libraries/PHPMailer2/fun.php';
// require '../../mail/includes/libraries/PHPMailer2/fun_mail.php';

//---------------邮件发送-------end--------


//http://en.ct21.com.au/PHPMailer2/lyReq.php?act=reg_add
//http://www.ztcs.net/PHPMailer2/lyReq.php?act=reg_add



//$act=$_POST["act"];
$act=!empty($_REQUEST["act"])?$_REQUEST["act"]:"";

//echo "---------$act---------------";

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
		
		/*
		//验证码检测
		if($rzcode == '' || $rzcode != strtolower(GetCkVdValue()))
		{			
			//Msg('验证码填写不正确!','');
			$data='{"tishi":"5","pass":"null"}';//reg_add---验证码填写不正确			
			echo $data;			
			exit();
		}
		*/
		
		
		$uid=!empty($uid)?$uid:"";
		$uname=!empty($uname)?$uname:"";
		$phone=!empty($phone)?$phone:"";
		$money=!empty($money)?$money:"";
		$bank=!empty($bank)?$bank:"";
		$bankid=!empty($bankid)?$bankid:"";
		//mypass111
		$pass="mypass666";
		
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
	else if($act=="get_uid")
	{
		$mytm=date('dHis',time());
		$data='{"uid":"xae'.$mytm.'"}';
	}
	

	echo $data;
}







?>