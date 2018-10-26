<?php

//验证码获取函数

function GetCkVdValue()
{

	if(!isset($_SESSION)) session_start();

	return isset($_SESSION['ckstr']) ? $_SESSION['ckstr'] : '';

}



function Msg($msg_str,$msg_url){
	
	$msec=1500;//延迟2秒再跳转
	
	if ($msg_str==''){
		switch($msg_url){
		case '':
			echo '<script type="text/javascript">location.href="'.$_SERVER['PHP_SELF'].'";</script>';
			break;
		case 'PageUrl':
			echo '<script type="text/javascript">location.href="'.GetPageUrl('').'";</script>';
			break;
		case 'Back':
			echo '<script type="text/javascript">history.back();</script>';
			break;
		case 'Close':
			echo '<script type="text/javascript">window.close();</script>';
			break;
		case 'Referer':
			echo '<script type="text/javascript">location.href="'.$_SERVER['HTTP_REFERER'].'";</script>';
			break;
		default:
			echo '<script type="text/javascript">location.href="'.$msg_url.'";</script>';
			break;
		}
	}
	else{
		switch($msg_url){
		case '':
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){location.href="'.$_SERVER['PHP_SELF'].'";},'.$msec.');</script>';
			break;
		case 'PageUrl':
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){location.href="'.GetPageUrl('').'";},'.$msec.');</script>';
			break;
		case 'Back':
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){history.back();},'.$msec.');</script>';
			break;
		case 'Close':
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){window.close();},'.$msec.');</script>';
			break;
		case 'Referer':
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){location.href="'.$_SERVER['HTTP_REFERER'].'";},'.$msec.');</script>';
			break;
		default:
			echo '<script type="text/javascript">myAlert("'.$msg_str.'");setTimeout(function(){location.href="'.$msg_url.'";},'.$msec.');</script>';
			break;
		}
	}
	exit();
}


?>