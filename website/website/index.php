	<!DOCTYPE html>

	<?php session_start();

	if (! isset($_SESSION['email'])) {
	     header('location: login.php');
	}
	 ?> 
	<html lang="en">
	<head>
		<title>Website</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		 <script type='text/javascript' src='tinymce/tinymce.min.js'></script>
	     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	     <script type='text/javascript' src='tinymce/tinymce.min.js'></script>

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
	     tinymce.init({
	     selector: '.tinymce'
	   });
	  </script>
	</head>
	<body>
		
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">

	   

	</head>

	<form style="width =100%;" action="action.php?action=post" enctype="multipart/form-data" method="post"  class="validate-form">
	<div class="wrap-input100 " data-validate = "You Must Write Something !!">

	<textarea name="tiney" class="tinymce wrap-input100 validate-input" style="display: block; margin-top=100px;"  placeholder="Describe yourself here..."

	data-validate = "you cannot post empty"  ></textarea>
	 
	</div>
	<div>
	<input name="uploadedimage" type="file" class="btn btn-default" style="margin-top:100px;" >
	</div>
	<input type="submit" value="Submit" style="  width:100px;  margin-left:700px;" class="btn btn-default">	

	</form>

	 
	<form style="width =100%;" action="action.php?action=comment" enctype="multipart/form-data" method="post"  class="validate-form">
	<div class="wrap-input100 " data-validate = "You Must Write Something !!">


	 
	 <script type="text/javascript">
	  function redirpost(elem) {
	 
	  var x =elem.value
	 
	 $("#dialog").dialog({
	           
	     title: "jQuery Dialog",
	     width: 450,
	     height: 150,
	 });
	$("#delete").click(function () {
	window.location.replace( "action.php?action=deletepost&id="+x);
	});
	$("#cancle").click(function () {
	$('#dialog').dialog('close');
	  
	 });		
	}
	</script>


	 <script type="text/javascript">
	function redircomment(elem) {
	var x =elem.value; 
	 
	 $("#dialog").dialog({
	           
	    title: "jQuery Dialog",
	    width: 450,
	    height: 150,
	       });
	$("#delete").click(function () {
	window.location.replace( "action.php?action=deletecomment&id="+x);
	});
	$("#cancle").click(function () {
	
	$('#dialog').dialog('close');

	 });
		
	  }
	</script>
	<?php 
	 echo '</br>';
	 echo '</br>';

	 include('connect.php');

	$conn = connect_to_db(); //connect todb;     
	$sq ="SELECT * FROM `posts` ";   // get all posts and display it .
	$result = mysqli_query($conn , $sq);
	$num =  mysqli_num_rows($result);
	if($num>0){			
	while($row = $result->fetch_assoc()) {		
	echo '<div  style="width:100%; border: 1px solid #e1e4ea ;border-radius: 2px; height:120px; ">';  
	//check user to give apility to delete comment
	if($row['email']==' '.$_SESSION['email']){
	echo ' <button  onclick="redirpost(this);"  type="button" class="glyphicon glyphicon-trash post" style"float:right;" value="'.$row['id'].'"></button>';
			}
	echo($row['content']); 
	echo'</div> ';
	$_SESSION['postid']= $row['id'];   
	// check if post have image or not .				 
	if($row['img_path']!="no image"){
	echo'<div style=" border: 1px solid #e1e4ea;  " >' ; 
	echo'<img style="width:100%; " src="'. $row['img_path'].'">'; 
	echo '</div>';	
	}
	$sql ="SELECT * FROM `comments` WHERE post_id=".$row['id']; // get all comments and display it .		 			
	$results = mysqli_query($conn , $sql);
	$numb =  mysqli_num_rows($results);
	if($numb>0){	
	 while($rows = $results->fetch_assoc()) {
	if($rows['post_id']==$row['id']){//
				
	echo '<button  onclick="redircomment(this);"  type="button"class="glyphicon glyphicon-trash comment" value="'.$rows['id'].'"></button>';
	echo$rows['content'].'</br>';}
	}
	}
			
			//echo'</div>';
	echo'<div style=" border: 1px solid #e1e4ea; height:30px; " >';
	echo'<input type="text "  placeholder="write comment here" name="' . $row['id'].'">' ;  
	echo'<button name="butt" style=" height:100%;  padding :5px ; float:right; padding-top :5px;" class="btn btn-default" value=';echo $row['id']; echo' > comment'; 
	echo'</button>';
	echo'</div>';
	echo '</br>';
	echo '</br>';
		   }
	} else {
	echo "0 results";
	}

	?> 	
	</div>	
	<script type="text/javascript">
	function logout() {  
	window.location.replace( "action.php?action=logout");
	  }
	</script>
	<button name="butt" style="  " onclick="logout();"class="btn btn-default"> logout
			
	</button>
	<div id="dialog" style="display: none" align = "center">
	   Are you sure you want to delete ?
	   <div id ="delete" style="float:left; margin-top:55px;"> <button style >Delete</button> </div>
	    <div id ="cancle"style=" float:right; margin-top:55px;"> <button style >cancel</button> </div>
	</div>
	 </form>
				
				</div>
			</div>
		</div>
		
		

		
	<!--===============================================================================================-->	

	<!--===============================================================================================-->
		
	<!--===============================================================================================-->
		
	<!--===============================================================================================-->
		<script >
			$('.js-tilt').tilt({
	            scale: 1.1
			})
		</script>
	<!--===============================================================================================-->

	</body>
	</html>