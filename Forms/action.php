<?php  
include('connect.php');
session_start();
$act  = isset($_GET["action"])?$_GET["action"]:"";
//echo $act;
$conn = connect_to_db(); 
		//header('location:Register.php');


if($act=='register'){
	$first = $_POST["first"]; 
    $last = $_POST["last"]; 
    $email = $_POST["email"];	
    $password = $_POST["password"];	
    $city = $_POST["city"]; 
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
//echo "exist";
$_SESSION['message']="error";
}
		else{
			$sql = "insert into users 
			(first,last,email,city,password) values (' ".$first."' , '".$last."' , '" .$email."','".$city."',".$password.")"; 
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
       if($email==$row['email'] && $password ==$row['password']){
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