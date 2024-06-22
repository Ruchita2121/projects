//box functions below
var xmlhttp;
function send(z){
	if(z.length==0){
		document.getElementById('mailMsg').innerHTML='email field is Empty and Uneditable. Mail not sent. Type in Activation Code below';
		}
		else document.getElementById('mailMsg').innerHTML='Mail has been sent to your account'+'<a href="index.php">go to home page</a>';
	//var message="Mail has been sent to your account";
	//alert(z);
	}
//==================================================================================================
	function sendIt(){
		//var g=document.forgotPass.sendMail.value
		xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="forgotPass.php";
url=url+"?mailForgot="+document.forgotPass.sendMail.value+"";
xmlhttp.onreadystatechange=stateChanged5;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}
//=================
function stateChanged5()
{
if (xmlhttp.readyState==4)
{
		document.getElementById("MsgForgot").innerHTML=xmlhttp.responseText;
	alert (g);
//alert(xmlhttp.responseText);
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
		}
		
		//==================================================================================================
/*	function sendIt2(){
		//var g=document.forgotPass.sendMail.value
		xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="forgotPass.php";
url=url+"?mailForgot="+document.custMail.mailTxt.value+"";
xmlhttp.onreadystatechange=stateChanged9;
xmlhttp.open("POST",url,true);
xmlhttp.send(null);
}

function stateChanged9()
{
if (xmlhttp.readyState==4)
{
		document.getElementById("mailMsg").innerHTML=xmlhttp.responseText;
	alert (g);
//alert(xmlhttp.responseText);
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
		}
		*/
//===============================================================================================================================

//===============================================================================================================================
//fork javascript attempt
    function form() 
	{
      new FORK.Ajax('POST', 'login.php',
                        {form: "form1",
                         onSuccess: function(o) {alert("success");},
                         onComplete: function(o) {alert("failure");}}
                       );
    }
//===============================================================================================================================
	function checkFields(){
		var b=document.registration.Cust_name.value;
		var c=document.registration.Cust_Surname.value;
		var d=document.registration.Cust_Address.value;
		var e=document.registration.Cust_Town.value;
		var f=document.registration.Cust_Email.value;
		var g=document.registration.gender.value;
		var x=document.registration.CustPassword.value;
		var y=document.registration.confirmPassword.value;
		if(b.length==0 ||c.length==0 ||d.length==0 ||e.length==0 ||f.length==0 ||g.length==0 ||x.length==0 ||y.length==0 ){document.getElementById('errREG').innerHTML="All fields required. Please enter value in the missing field";}
		else if(x!=y || x.length==0 || y.length==0){
			document.getElementById('passMatch').innerHTML="Passwords Don't match";
			//alert("Passwords don't match");
			}
			
			else if(b.length>15 || c.length>15){document.getElementById('errors').innerHTML="name field too long";}
			else {alert("Registration Successful");
			submit();
			}
	//	if(g.selected==false){document.getElementById('errors').innerHTML="Please select a gender";}
	//	if(g.selected==false){document.getElementById('errors').innerHTML="Please select a gender";}document.getElementById('passMatch').style.display="none";	
		}
//===============================================================================================================================		
//form validation
	function checkActivate(val){
			//alert("hey");
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="checkActivation.php";
url=url+"?activeCode="+val;
xmlhttp.onreadystatechange=stateChanged1;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged1()
{
if (xmlhttp.readyState==4)
{
	if(xmlhttp.responseText == "Account activated")
	{
		//document.getElementById("activateMessage").style.display="inline";
		document.getElementById("activateMessage").innerHTML = "Your account is now active";
	}
	else
	{
		document.getElementById("activateMessage").innerHTML=xmlhttp.responseText;
	}
//alert(xmlhttp.responseText);
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
		}
//===============================================================================================================================		
function validator1(a,b)
{	//echo "a"+a;
	//alert(b);
if(a.length==0)
{
	//document.getElementById("b").innerHTML="VALIDATION ERROR";
	document.getElementById(b).style.display="block";
}
else document.getElementById(b).style.display="";
/*else if(a.length>30)
{
	document.getElementById(b).innerHTML="Value entered exceeds standard limit of 30";
}*/
}
//===============================================================================================================================
//Part below is for the AJAX LOGIN	
	

function getLogin()
{
	//alert("hey");
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="login.php";
url=url+"?email="+document.form1.myemail.value+"";
url=url+"&password="+document.form1.mypassword.value+"";
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
	document.getElementById("LOGIN").style.display="none";
		document.getElementById("loginMessage").innerHTML=xmlhttp.responseText;
		if(xmlhttp.responseText=="Wrong username or Password."){
			document.getElementById("LOGIN").style.display="";}
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
//=======================================================================================================================
/*function logout()
{
	//alert("hey");
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="Logout.php";
//url=url+"?email="+document.form1.myemail.value+"";
//url=url+"&password="+document.form1.mypassword.value+"";
xmlhttp.onreadystatechange=stateChanged3;
xmlhttp.open("POST",url,true);
xmlhttp.send(null);
}

function stateChanged3()
{
if (xmlhttp.readyState==4)
{
document.getElementById('LOGIN').style.display = 'compact';
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}*/