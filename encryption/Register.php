<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>	
<?php session_start();?>
<title>Register </title>
<style type="text/css">
		html,body{height: 100%; padding:0; margin:0;}
		form{ width:30em;height:18em; margin:-5em auto 0 auto; position: relative; top:30%; border:1px dotted #ccc; padding:.25em; }
		fieldset{ margin:0;   border:0;padding:0;}
		legend{float:left; font-size: 200%; text-align: center; color:blue; font-weight: bold; border-bottom: 1px solid blue; width:15em;  padding:0; }
		label, label+ input {display:inline; float:left; margin-top:1em;}
		label{text-align: left; width:28%; clear: left; margin-top:.8em; }
				p{text-align: left; width:50%; clear: left; margin-top:.8em;color :red; }

		label+ input{ width:60%; padding:.25em; ; margin-left:.5em; border: 1px inset;  margin-left: }
		label+ select{ width:60%; padding:.25em; ; margin-left:.5em; border: 1px inset;  margin-left: }
		 label, label+ select {display:inline; float:left; margin-top:1em;}
		#reg{  margin-top:1em; position: relative; float:left;clear: left; margin-left: 29%}
</style>
</head>
<body>

	<form action="action.php?action=register" method="post">
		<fieldset><legend>Register Form</legend>
			<label for="First Name">First Name </label><input  type="text" name="first" id="name" value="">
			<label for="Last Name">Last Name </label> <input  type="Text" name="last" id="password" >
			<label for="Email"> Email </label> <input  type="email" name="email" id="" >
			<label for="Password"> Password </label> <input  type="password" name="password" id="" >
			<label for="City"> City </label>
<select name ="city">			
            <option value="Jenin">Jenin</option>
            <option value="Nablus">Nablus</option>
             <option value="Ramallah">Ramallah</option>
            <option value="Tulkarim">Tulkarim</option>
</select>
			<input type="submit" value="Register" id="reg">
		</fieldset>	
		<?php 
	if(isset($_SESSION['message'])){
		
		echo'<p>this user already exist</p>';
		unset($_SESSION['message']); // will delete just the name data

	}
	?>
	</form>
	
</body>
</html>