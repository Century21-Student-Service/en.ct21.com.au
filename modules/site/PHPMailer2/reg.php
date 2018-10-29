<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>用户注册</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" type="image/x-icon" href="http://1317m.com/images/favicon.ico">
<script type="text/javascript" src="/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="/js/check.js"></script>
<style>
html{overflow-x:hidden;overflow-y:scroll}
*{ margin:0; padding:0}
input,button,textarea,select,optgroup,option{font-family:"微软雅黑","Microsoft YaHei","黑体","simhei","宋体","simsun";font-size:inherit;font-style:inherit;font-weight:inherit;padding:0px; margin:0px;}
:focus{outline:0;}
img { vertical-align:middle;border:none;}
table{border-collapse:collapse;border-spacing:0;}
button,.reloadcode{ cursor:pointer;}
a {text-decoration:none;outline:none;blr:expression(this.onFocus=this.blur());color:#222}
a:hover{color:#f60}
.M{ width:220px; height:20px; border:1px solid #999; padding:2px 2px}
.M1{ width:100px; height:20px; border:1px solid #999; padding:2px 2px}
/* text */
body{font-family:"微软雅黑","Microsoft YaHei","黑体","simhei","宋体","simsun";font-size:14px;background-color:#FECAB1; overflow-x:hidden;}
.hidden {
	display:none;
}
.btn{ padding:2px 15px 3px 15px}
.red{ color:red}
.table_code td{ padding:5px 0}
.table_code td span{ font-size:12px}
.error{ color:red;font-weight:bold; background:url(images/error.png) no-repeat left center; text-indent:1.5em }
.success{ color:red; font-weight:bold; font-size:16px; line-height:30px; padding:20px}
.shuaxin{ cursor:pointer}
#reg{ width:600px; margin:30px auto;background-color:#FECAB1; padding:0px 0 30px 0}
#msg{ margin:20px 0 0 90px}
</style>
<script>
$(function(){
	$(".shuaxin").click(function(){
		
		//$('#shuaxin').load(location.href+' #shuaxin');
		
		$.ajax({                    
			type: "POST",
			dataType:'json',
			url: "rReq.php?act=get_uid",
			data:{uid:''},
			success: function(msg)
			{
				var uid = msg.uid;
				if(uid!='')
				{
					myform.uid.value=uid;
					$("#showuid").html(uid);
					//alert(uid);
				}
				
			}
	    });     
		
		
		
        });
	});        
</script>
</head>
<body>
<?php
		$mytm=date('dHis',time());
		$uidstr="xae$mytm";
?>

<div id="reg">
	<form name="myform">   
		<table cellpadding="3" cellspacing="1" class="table_code">
            <tbody><tr><td width="16%" align="right"><strong> 用户名：</strong></td>
            <td><div id="shuaxin" style="float:left"><input type="hidden" id="uid" value="<?php echo $uidstr;?>" class="M" disabled=""><strong id="showuid" class="red"><?php echo $uidstr;?></strong></div>
            <span style="float:left; padding-left:10px"><input name="button" type="button" value=" 再选一次 " class="shuaxin red"></span>
            </td>
          </tr>
          	  <tr>
		    <td align="right"><strong>真实姓名：</strong></td>
		    <td><input type="text" id="uname" maxlength="10" class="M"> <span id="_uname">姓名必需与提款银行账户登记姓名一致</span></td>
	      </tr>
          
            <tr>
		    <td align="right"><strong>手机号码：</strong></td>
		    <td><input type="text" id="phone" maxlength="11" class="M" onkeyup="this.value=this.value.replace(/\D/g,&#39;&#39;)" onafterpaste="this.value=this.value.replace(/\D/g,&#39;&#39;)"> <span id="_phone">我们将以手机形式确认提款，必需填写真实号码</span></td>
	      </tr>
          
           <tr>
		    <td align="right"><strong>开户金额：</strong></td>
		    <td><input type="text" id="money" maxlength="10" class="M" onkeyup="this.value=this.value.replace(/\D/g,&#39;&#39;)" onafterpaste="this.value=this.value.replace(/\D/g,&#39;&#39;)"> <span class="red">元</span> <span id="_money">最低存款 1000 元 RMB/HKD(人民币或港币)</span></td>
	      </tr>
          
           <tr>
		    <td align="right"><strong>开户银行：</strong></td>
		    <td><input type="text" id="bank" maxlength="20" class="M"> <span id="_bank">广东省xxx市xxx银行XX分行</span></td>
	      </tr>
          
           <tr>
		    <td align="right"><strong>银行账户：</strong></td>
		    <td><input type="text" id="bankid" maxlength="30" class="M" onkeyup="this.value=this.value.replace(/\D/g,&#39;&#39;)" onafterpaste="this.value=this.value.replace(/\D/g,&#39;&#39;)"> <span id="_bankid">请仔细核对账户是否正确</span></td>
	      </tr>

            <tr>
		    <td align="right"><strong>验证码：</strong></td>
		    <td><input type="text" id="validate" maxlength="50" class="M1"> 
					<img src="yzm/ckstr.php" alt="点击我更换图片" id="ckstr" style="cursor:pointer; width:80px; height:26px; vertical-align:top" title="点击我更换图片" onclick="this.src=this.src+&#39;?&#39;">
					<a onclick="reloadcode()" title="看不清？换一个" class="reloadcode">看不清？换一个</a> 
			</td>
	      </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="button" name="submit" class="btn" value="确定注册"></td>
          </tr>
        </tbody></table>
        <div id="msg"></div>
</form>
</div>
	  <script>
	$(function(){
	$(".btn").click(function(){
		var uid   = $("#uid").val();	
	//	var pass   =$("#password").val();
		//var repassword   = $("#repassword").val();
		var uname   = $("#uname").val();
		var phone   = $("#phone").val();	
		var money   = $("#money").val();	
		var bank   = $("#bank").val();	
		var bankid   = $("#bankid").val();	
		//var address   = $("#address").val();	
		var validate   = $("#validate").val();	
		//var email   = $("#email").val();	
		if (uname.Trim()=='') {  
		   $("#msg").addClass('error').fadeIn('slow').html("请填写真实姓名");
		   setTimeout("dhide()",3000);
			//alert('请填写真实姓名');
			$("#uname").focus().select();
            return false; 
        }
		
			if (phone.Trim()=='') {  
		    $("#msg").addClass('error').fadeIn('slow').html("请填写手机");
		setTimeout("dhide()",3000);
			$("#phone").focus().select();
            return false; 
        }
		
			if (money.Trim()=='') {  
		    $("#msg").addClass('error').fadeIn('slow').html("请填写开户金额");
			setTimeout("dhide()",3000);
			$("#money").focus().select();
            return false; 
        }
		
		if (bank.Trim()=='') {  
		    $("#msg").addClass('error').fadeIn('slow').html("请填写开户行");
		setTimeout("dhide()",3000);
			$("#bank").focus().select();
            return false; 
        }
		
				if (bankid.Trim()=='') {  
		   $("#msg").addClass('error').fadeIn('slow').html("请填写银行账户");
			setTimeout("dhide()",3000);
			$("#bankid").focus().select();
            return false; 
        }
	
		if (validate.Trim()=='') {  
		    $("#msg").addClass('error').fadeIn('slow').html("请输入验证码");
			setTimeout("dhide()",3000);
			$("#validate").focus().select();
            return false; 
        }	
		
		$.ajax({                           
		type: "POST",
		dataType:  'json',
		beforeSend:function(){
			$("#msg").hide(),
			$(".btn").val("注册中...请稍候"),
			$('.btn').attr("disabled","disabled");},
		url: "rReq.php?act=reg_add",
		data:{uid:uid,uname:uname,uname:uname,phone:phone,money:money,bank:bank,bankid:bankid,validate:validate},
			success: function(msg){
		    var tishi = msg.tishi;
			var pass = msg.pass;
			
			//alert(tishi);
			//tishi_nr
			if(tishi==1){
				$("#msg").hide();
				$(".M").val("");
				$(".M1").val("");
				$(".btn").val("注册成功");
				//alert("恭喜！注册成功！请牢记您的用户名和密码 \n用户名："+uid+"\n密码："+pass);
              //  window.location.href="../";
				$("#msg").removeClass('error').addClass('success').fadeIn('slow').html("恭喜！注册成功！请牢记您的用户名和密码<br>用户名："+uid+"<br>密码："+pass+"<br/><br/><a href='http:\/\/baidu.com/' target='_blank'><img src='/images/jr.jpg' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http:\/\/www.baidu.com/' target='_blank'><img src='/images/cz.jpg' /></a>");

				$("#shuaxin").html(uid);
				$(".table_code").css("display","none");
			}
			else{
				
				if(tishi==5)
				{
					alert("验证码有误!");					
				}
				
				$("#msg").removeClass('success').addClass('error').fadeIn('slow').html(msg);
				//setTimeout("dhide()",3000);
				reloadcode()
				$(".btn").val("确定注册");
				$(".btn").removeAttr("disabled");//恢复按钮
			}
		  }
	    });
		
		
		
		});
})

function dhide(){
$("#msg").fadeOut(1000);	
}
function reloadcode()
{ 
	//$("#yzm").attr("src","include/vdimgck.php?ranco="+Math.random());
	var v=document.getElementById('ckstr');v.src=v.src+'?';return false;

} 
 </script>

<div id="qq-sendUrl-btn"></div></body></html>