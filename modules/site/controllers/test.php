<?php


//'获取当前所在页面文件名
	function GetCurUrl($imode)
	{
	
		$retstr="";
		$Servername="";
		$qs="";
		//Dim ScriptAddress,Servername,qs
		$scriptAddress = $_SERVER['SCRIPT_NAME'];		
		
		
		if($imode==1)
		{
			$retstr=$scriptAddress;
		}
		else	//'imode=2时
		{
			//$_SERVER['http_host'];//带端口
			//$_SERVER['Server_Name'];//不带端口
			$servername = $_SERVER['SERVER_NAME'];
			//qs=Request.QueryString
			//if qs<>"" then
			//	GetCurUrl ="http://"& $servername & $scriptAddress &"?"&qs
			//else
				$retstr ="http://".$servername.$scriptAddress;
			//end if	
		}			

	   
	    //
		// '其它参考
		// ' pathfilename=trim(Request.ServerVariables("SCRIPT_NAME"))
		// ' for i=len(pathfilename) to 1 step -1
			// ' if mid(pathfilename,i,1)="/" then
				// ' filename=right(pathfilename,len(pathfilename)-i)
				// ' exit for
			// ' end if
		// ' next
	   //'注意：获取文件名:(不带路径)= filename。
	   
	   
	   
	   return $retstr;
	}
	
	echo "GetCurUrl=".GetCurUrl(1);
	echo "<br/>GetCurUrl=".GetCurUrl(2);
	
?>