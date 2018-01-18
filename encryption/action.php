<?php  
include('connect.php');
session_start();
$act  = isset($_GET["action"])?$_GET["action"]:"";
//echo $act;
$conn = connect_to_db(); 
		//header('location:Register.php');


if($act=='register'){
	//$first = $_POST["first"];
  $first = mysqli_real_escape_string($conn, $_POST['first']);
	//echo $first;
    $last =mysqli_real_escape_string($conn,$_POST["last"]); 
    $email =mysqli_real_escape_string($conn,  $_POST["email"]);	
    $password =mysqli_real_escape_string($conn,  $_POST["password"]);	
    $city =mysqli_real_escape_string($conn,  $_POST["city"]); 
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
//echo "exist";
$_SESSION['message']="error";
}
		else{
			$sql = "insert into users 
			(first,last,email,city,password) values (' ".$first."' , '".$last."' , '" .$email."','".$city."','".sha1($password)."')"; 
		$result = mysqli_query($conn, $sql);
		
		}
		header('location:Register.php');

}

if($act=='login'){
	$email = $_POST["email"];	
    $password = $_POST["password"];	
	
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
						$sql = "select email , password from users 
			 where email= '" .$email."' ";
		$result = mysqli_query($conn, $sql);
		 while($row = $result->fetch_assoc()) {
       if($email==$row['email'] && sha1($password) ==$row['password']){
		   header('location: Register.php');
	   }
	   else{
		   $_SESSION['message']="wrong";
		    header('location: login.php');
	   }
    }
	
		}
		//header('location:Register.php');
//echo "exist";

		else{
         $_SESSION['message']="not_found";
		 echo "No result";
		  header('location: login.php');


}

}


?>