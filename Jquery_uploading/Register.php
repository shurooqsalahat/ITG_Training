<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>	
<?php session_start();?>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>
<script>
$(document).ready(function() {
$('#reg').click(function(e) {
	debugger;
var sEmail = $('#txtEmail').val();
// Checking Empty Fields
if ($.trim(sEmail).length == 0 || $("#first").val()=="" || $("#last").val()=="") {
alert('you must fill all fields');
e.preventDefault();
}
if (validateEmail(sEmail)) {
alert('Nice!! your Email is valid, now you can continue..');
}
else {
alert('Invalid Email Address');
e.preventDefault();
}
});
});


// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}
 
 </script>
  
<title>Register </title>
<style type="text/css">
		html,body{height: 100%; padding:0; margin:0;}
		form{ width:30em;height:21em; margin:-5em auto 0 auto; position: relative; top:30%; border:1px dotted #ccc; padding:.25em; }
		fieldset{ margin:0;   border:0;padding:0;}
		legend{float:left; font-size: 200%; text-align: center; color:blue; font-weight: bold; border-bottom: 1px solid blue; width:15em;  padding:0; }
		label, label+ input {display:inline; float:left; margin-top:1em;}
		label{text-align: left; width:28%; clear: left; margin-top:.8em; }
				p.error{text-align: left; width:50%; clear: left; margin-top:.8em;color :red; }
                p.done{text-align: left; width:50%; clear: left; margin-top:.8em;color :green ; } 
		label+ input{ width:60%; padding:.25em; ; margin-left:.5em; border: 1px inset;  margin-left: }
		label+ select{ width:60%; padding:.25em; ; margin-left:.5em; border: 1px inset;  margin-left: }
		 label, label+ select {display:inline; float:left; margin-top:1em;}
		#reg{  margin-top:1em; position: relative; float:left;clear: left; margin-left: 29%}
		#out{   position: relative; float:left;clear: left; margin-left: 58% ;margin-top:-1.5em}
</style>
</head>
<body>

	<form action="action.php?action=register" enctype="multipart/form-data" method="post">
		<fieldset><legend>Register Form</legend>
			<label for="First Name">First Name </label><input  type="text" name="first" id="first" value="">
			<label for="Last Name">Last Name </label> <input  type="Text" name="last" id="password" >
			<label for="Email"> Email </label> <input  type="Text" name="email" id="txtEmail" >
			<label for="Password"> Password </label> <input  type="password" name="password" id="" >
			<label for="City"> City </label>
<select name ="city">			
            <option value="Jenin">Jenin</option>
            <option value="Nablus">Nablus</option>
             <option value="Ramallah">Ramallah</option>
            <option value="Tulkarim">Tulkarim</option>
</select>
			<label for="image"> Image </label>  
			<input name="uploadedimage" type="file">

			<input type="submit" value="Register" id="reg">
			<input type="button" value="Log Out" id="out" onClick=" document.location.href='action.php?action=logout' "  >

		</fieldset>	
		<?php 
	if(isset($_SESSION['message'])){
		if ($_SESSION['message'] == "error")
		echo'<p class = "error">this user already exist</p>';
	else {
		echo'<p class = "done">User is registered in database</p>';
		
	}		unset($_SESSION['message']); // 

	}
	?>
	</form>
	
</body>

</html>