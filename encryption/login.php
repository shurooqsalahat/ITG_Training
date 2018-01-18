<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>	
<?php session_start();?>

<title>Log  In </title>
<style type="text/css">
		html,body{height: 100%; padding:0; margin:0;}
		form{ width:30em;height:9em; margin:-5em auto 0 auto; position: relative; top:50%; border:1px dotted #ccc; padding:.25em; }
		fieldset{ margin:0;   border:0;padding:0;}
		legend{float:left; font-size: 200%; text-align: center; color:blue; font-weight: bold; border-bottom: 1px solid blue; width:15em;  padding:0; }
		label, label+ input {display:inline; float:left;margin-top:1em;}
		label{text-align: right; width:28%; clear: left; margin-top:.8em; }
		label+ input{ width:60%; padding:.25em; ; margin-left:.5em; border: 1px inset;  margin-left: }
		#sub{  margin-top:1em; position: relative; float:left;clear: left; margin-left: 29%}
		p{text-align: left; width:50%; clear: left; margin-top:.8em;color :red; }

</style>
</head>
<body>

	<form action="action.php?action=login" method="post">
		<fieldset><legend>Log In</legend>
			<label for="name">Email: </label><input  type="text" name="email" id="name" value="">
			<label for="password">Password: </label><input  type="password" name="password" id="password" >
			<input type="submit" value="Login" id="sub">
		</fieldset>
<?php 
if(isset($_SESSION['message'])){
		if($_SESSION['message']=="wrong"){
		echo'<p>check data please</p>';}
		else{echo'<p>not exist</p>';}
}
		unset($_SESSION['message']); // will delete just the name data

?>
		
	</form>
</body>
</html>