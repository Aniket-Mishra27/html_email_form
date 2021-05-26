<!DOCTYPE html>
<html>
<head>
<title> form </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type=text/css>

#font
{
margin-bottom:10px;
margin-left:200px;
margin-right:200px;
}
label
{
	position:relative;
	width:200px;
	top:10px;
	float:left;
}
input
{
	padding: 7px 5px 12px 15px;
	width:320px;
	border-radius:5;
	border : 1px solid grey;
}
#success
{
	font-color:green;
	display:none;
	margin-bottom:20px;
}
#error
{
	font-color:red;
	display:none;
	margin-bottom:20px;
}
#sub
{
left:120px;
height:50px;
width:75px;
}
#sub:hover
{
	color:red;
}
</style>
</head>
<body>
<form  method="POST">
<div id="success">youve have successfully created </div>
<div id="font">

<label name="email">Email</label>
<input type="text" name="email" id="email" placeholder="eg:ani@gmail.com">
</div>
<div id="font">
<label name="phone">Phone</label>
<input type="text" name="phone" id="phone" placeholder="eg:1234567890">
</div>
<div id="font">
<label name="pword">Password</label>
<input type="password" name="pword" id="pword" >
</div>
<div id="font">
<label name="cpword">Confirm_password</label>
<input type="password" name="cpword" id="cpword">
</div>
<div id="font">
<input type="submit" id="sub" value="Sign up" title ="click to sign up!">
</div>

</form>

<script type="text/javascript">
function isemail(email)
{
var regexp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return regexp.test(email);

}
$("#sub").click(function()
{
	var fieldmsg = "";
	var errormsg = "";

if($("#email").val() == "")
{
	if (fieldmsg =="")
		{
		fieldmsg += " email";
		}
	else
		{
		fieldmsg += ", email";
		}

}
if($("#phone").val() == "")
{
	if (fieldmsg =="")
		{
		fieldmsg += " phone";
		}
	else
		{
		fieldmsg += ", phone";
		}


}


if($("#pword").val() == "")
{
	if (fieldmsg =="")
		{
		fieldmsg += " pword";
		}
	else
		{
		fieldmsg += ", pword";
		}

}

if($("#cpword").val() == "")
{
	if (fieldmsg =="")
		{
		fieldmsg += " cpword";
		}
	else
		{
		fieldmsg += ", cpword";
		}

}
if(fieldmsg != "")
{
	errormsg = "The following Fields are missing " + fieldmsg;
}

if(isemail($("#email").val()) == false)
{

	errormsg += "email entered is wrong";
}else{
	abc = "test";	
     }
if($.isNumeric($("#phone").val() == false))
{
	errormsg += "Phone entered is wrong";
}
if($("#pword").val() != $("#cpword").val())
{
	errormsg += "Password and Confirm Password dont match";
}
if(errormsg != "")
{
	$("#error").html(errormsg);
	document.write(errormsg);
}
else
{
	$("#success").inner="You have created " + $("#email").val()
	$("#success").show();
	$("#error").hide();
}
});
</script>
</body>
</html>
<?php
$email=$_POST('name');
$phone=$_POST('phone');
$pword=$_POST('pword');
$from="From: $email /n Phone: $phone /n password: $pword";
$mailTo="am2382@srmist.edu.in";
$sub = "Getting value from form";
$header = "from: $email";
mail($mailTo,$sub,$from,$header) or die("Error!");
echo "Thank You!";
?>