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
	alert("0000000");
		$.ajax({                      
		type: "POST",
		dataType:  'json',
		beforeSend:function(){
			
			//alert("------0--------");
		},
		url: "rReq.php?act=reg_add",
		data:
			{uid:'',uname:'',money:88},
			success: function(msg)
			{
				var tishi = msg.tishi;
				var pass = msg.pass;
				
			}
	    });      
</script>
</head>
<body>









</body></html>