//if(window!=top){top.location.href=window.location.href}
function IsPici(s) 
{ 
var username = "0123456789"; 
for (i = 0; i < s.length;i++) 
{ 
//what
var c = s.charAt(i); 
if (username.indexOf(c) == -1) return false; 
} 
return true 
}  
function IsABC(s) 
{ 
var strcode = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
for (i = 0; i < s.length;i++) 
{ 
//what
var c = s.charAt(i); 
if (strcode.indexOf(c) == -1) return false; 
} 
return true 
}
//去空格
	String.prototype.Trim = function() { 
		var m = this.match(/^\s*(\S+(\s+\S+)*)\s*$/); 
		return (m == null) ? "" : m[1]; 
	}
	
	function getRadioBoxValue(radioName){ 
             var obj = document.getElementsByName(radioName);             //这个是以标签的name来取控件 
                  for(i=0; i<obj.length;i++)    { 
                   if(obj[i].checked){ 
                           return obj[i].value; 
                   } 
               }          
              return "undefined";        
 } 